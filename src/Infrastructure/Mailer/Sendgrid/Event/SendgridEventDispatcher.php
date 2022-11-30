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

namespace Nurschool\Notifier\Infrastructure\Mailer\Sendgrid\Event;

use SendGrid\Mail\Mail;

interface SendgridEventDispatcher
{
    public function dispatchStartedEvent(Mail $email): void;
    public function dispatchFinishedEvent(Mail $email, ?string $messageId = null): void;
    public function dispatchFailedEvent(Mail $email, string $messageError): void;
}