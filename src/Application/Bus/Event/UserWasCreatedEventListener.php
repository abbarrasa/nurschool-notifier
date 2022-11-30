<?php

/*
 * This file is part of the Nurschool project.
 *
 * (c) Nurschool <https://github.com/abbarrasa/nurschool>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Nurschool\Notifier\Application\Bus\Event;

use Nurschool\Common\Application\Url\SignService;
use Nurschool\Common\Domain\Event\DomainEventListener;
use Nurschool\Common\Domain\ValueObject\Uuid;
use Nurschool\Notifier\Application\Url\ClientRoute;
use Nurschool\Notifier\Application\Mailer\Mailer;
use Nurschool\Notifier\Domain\Event\UserWasCreated;
use Nurschool\Notifier\Domain\UserAccount;
use Nurschool\Notifier\Domain\ValueObject\Email;
use Nurschool\Notifier\Domain\ValueObject\FullName;

final class UserWasCreatedEventListener implements DomainEventListener
{
    private Mailer $mailer;
    private ClientRoute $clientRoute;
    private SignService $signService;
    private ?int $lifetime;

    public function __construct(
        Mailer $mailer,
        ClientRoute $clientRoute,
        SignService $signService,
        ?int $lifetime = null
    ) {
        $this->mailer = $mailer;
        $this->clientRoute = $clientRoute;
        $this->signService = $signService;
        $this->lifetime = $lifetime;
    }

    public function __invoke(UserWasCreated $message)
    {
        $userId = $message->getId();
        $userEmail = $message->getEmail();
        $firstname = $message->getFirstname();
        $lastname = $message->getLastname();
        $userAccount = new UserAccount(
            new Uuid($userId),
            new Email($userEmail),
            new FullName($firstname, $lastname)
        );

        if (!$message->getEnabled()) {
            $url = $this->clientRoute->generateActivateAccountUrl($userAccount->id());
            $signature = $this->signService->createSignature(
                $url,
                [(string) $userId, (string) $userEmail],
                [],
                $this->lifetime
            );
            $this->mailer->sendAccountActivationEmail($userAccount, $signature);
        } else {
            $this->mailer->sendWelcomeEmail($userAccount);
        }
    }
}