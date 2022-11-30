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

namespace Nurschool\Notifier\Infrastructure\Symfony\Sendgrid\Event;

use Nurschool\Notifier\Infrastructure\Mailer\Sendgrid\Event\SendgridEvent;
use SendGrid\Mail\Mail;
use Symfony\Contracts\EventDispatcher\Event;

final class SendgridStartedEvent extends Event implements SendgridEvent
{
    private Mail $email;

    public function __construct(Mail $email)
    {
        $this->email = $email;
    }

    public function getEmail(): Mail
    {
        return $this->email;
    }
}