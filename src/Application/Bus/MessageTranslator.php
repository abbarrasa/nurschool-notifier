<?php

namespace Nurschool\Notifier\Application\Bus;

use Nurschool\Notifier\Domain\Event\UserWasCreated;

class MessageTranslator
{
    public function translateMessageType(string $type): string
    {
        $typeMap = [
            'Nurschool\Platform\Domain\Event\UserWasCreated' => UserWasCreated::class
        ];

        return $typeMap[$type] ?? $type;
    }
}