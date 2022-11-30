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

namespace Nurschool\Notifier\Infrastructure\Symfony\EventSubscriber;

use Nurschool\Notifier\Infrastructure\Symfony\Sendgrid\Event\SendgridFailedEvent;
use Nurschool\Notifier\Infrastructure\Symfony\Sendgrid\Event\SendgridFinishedEvent;
use Nurschool\Notifier\Infrastructure\Symfony\Sendgrid\Event\SendgridStartedEvent;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class SendgridEventSubscriber implements EventSubscriberInterface
{
    private LoggerInterface $logger;

    /**
     * @required
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @inheritDoc
     */
    public static function getSubscribedEvents()
    {
        return [
            SendgridStartedEvent::class => 'onStarted',
            SendgridFinishedEvent::class => 'onFinished',
            SendgridFailedEvent::class => 'onFailed'
        ];
    }

    public function onFailed(SendgridFailedEvent $event): void
    {
        if (null !== $this->logger) {
            $email = $event->getEmail();
            $messageError = $event->getMessageError();

            $this->logger->error($messageError);
        }
    }

    public function onStarted(SendgridStartedEvent $event): void
    {
        if (null !== $this->logger) {
            $email = $event->getEmail();
            $this->logger->info('');
        }
    }

    public function onFinished(SendgridFinishedEvent $event): void
    {
        if (null !== $this->logger) {
            $email = $event->getEmail();
            $messageId = $event->getMessageId();
            $this->logger->info($messageId);
        }
    }
}