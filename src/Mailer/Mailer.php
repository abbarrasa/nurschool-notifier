<?php

/*
 * This file is part of the Nurschool Notifier component of Nurschool project.
 *
 * (c) Nurschool Notifier <https://github.com/abbarrasa/nurschool-notifier>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Nurschool\Notifier\Mailer;

use Nurschool\Notifier\Mailer\Config\ConfigMailer;
use Nurschool\Notifier\Mailer\Domain\MailerInterface;
use Nurschool\Notifier\Mailer\Domain\Model\Config\ConfigEmail;
use Nurschool\Notifier\Mailer\Domain\Model\Email\Address;
use Nurschool\Notifier\Mailer\Domain\Model\Email\Message;
use Nurschool\Notifier\Mailer\Domain\Model\Email\Recipient;
use Nurschool\Notifier\Mailer\Domain\Model\Email\TemplatedContent;
use Nurschool\Notifier\Mailer\Domain\Provider\MailProvider;

final class Mailer implements MailerInterface
{
    /** @var MailProvider */
    private $provider;

    /** @var ConfigMailer */
    private $configMailer;

    public function __construct(MailProvider $provider, ConfigMailer $configMailer)
    {
        $this->provider = $provider;
        $this->configMailer = $configMailer;
    }

    public function sendConfirmationEmail(string $email, string $signedUrl, \DateTimeInterface $expiresAt, array $parameters = [])
    {
        $config = $this->configMailer->get(ConfigEmail::ID_EMAIL_CONFIRMATION);
        $context = [
            'url' => $signedUrl,
            'expiresAt' => $expiresAt->format('g')
        ];

        $email = $this->provider->createEmail(
            [new Recipient(new Address($email))],
            new Address($config->getAddress(), $config->getName()),
            new Message($config->getSubject(), new TemplatedContent($config->getTemplate(), $context))
        );

        return $this->provider->sendEmail($email);
    }

    public function sendResettingPasswordEmail()
    {
        // TODO: Implement sendResettingPasswordEmail() method.
    }
}