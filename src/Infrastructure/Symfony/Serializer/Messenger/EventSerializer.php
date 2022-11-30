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

namespace Nurschool\Notifier\Infrastructure\Symfony\Serializer\Messenger;

use Nurschool\Notifier\Application\Bus\MessageTranslator;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Exception\MessageDecodingFailedException;
use Symfony\Component\Messenger\Transport\Serialization\Serializer;

class EventSerializer extends Serializer
{
    private MessageTranslator $messageTranslator;
    
    /**
     * @required
     */
    public function setMessageTranslator(MessageTranslator $messageTranslator)
    {
        $this->messageTranslator = $messageTranslator;
    }

    public function decode(array $encodedEnvelope): Envelope
    {
        if (null === $this->messageTranslator) {
            throw new MessageDecodingFailedException('No message translator defined.');
        }

        $translatedType = $this->messageTranslator->translateMessageType(
            $encodedEnvelope['headers']['type']
        );

        $encodedEnvelope['headers']['type'] = $translatedType;

        return parent::decode($encodedEnvelope);
    }
}