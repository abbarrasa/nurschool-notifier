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

namespace Nurschool\Notifier\Infrastructure\Symfony\Sendgrid;

use Nurschool\Notifier\Infrastructure\Mailer\Sendgrid\Event\SendgridEvent;
use Nurschool\Notifier\Infrastructure\Mailer\Sendgrid\Event\SendgridEventDispatcher;
use Nurschool\Notifier\Infrastructure\Symfony\Sendgrid\Event\SendgridFailedEvent;
use Nurschool\Notifier\Infrastructure\Symfony\Sendgrid\Event\SendgridFinishedEvent;
use Nurschool\Notifier\Infrastructure\Symfony\Sendgrid\Event\SendgridStartedEvent;
use SendGrid\Mail\Mail;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

final class SymfonySendgridEventDispatcher implements SendgridEventDispatcher
{
    private EventDispatcherInterface $dispatcher;

    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function dispatchStartedEvent(Mail $email): void
    {
        $this->dispatcher->dispatch(new SendgridStartedEvent($email));
    }

    public function dispatchFinishedEvent(Mail $email, ?string $messageId = null): void
    {
        $event = new SendgridFinishedEvent($email, $messageId);
        $this->dispatcher->dispatch($event);
    }

    public function dispatchFailedEvent(Mail $email, string $messageError): void
    {
        $event = new SendgridFailedEvent($email, $messageError);
        $this->dispatcher->dispatch($event);
    }
}