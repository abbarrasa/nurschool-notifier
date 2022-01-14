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

use Nurschool\Notifier\Mailer\Provider\ProviderInterface;

final class Mailer implements MailerInterface
{
    /** @var ProviderInterface */
    private $provider;

    public function __construct(ProviderInterface $provider)
    {
        $this->provider = $provider;
    }

    public function sendConfirmationEmail()
    {
        // TODO: Implement sendConfirmationEmail() method.
    }

    public function sendResettingPasswordEmail()
    {
        // TODO: Implement sendResettingPasswordEmail() method.
    }
}