<?php

declare(strict_types=1);

namespace Nurschool\Notifier\Application\Url;

use Nurschool\Common\Domain\ValueObject\Uuid;

final class ClientRoute
{
    private const ACTIVATE_ACCOUNT = '/api/v1/users/{id}/activate';

    private string $host;

    public function __construct(string $host)
    {
        $this->host = $host;
    }

    public function generateActivateAccountUrl(Uuid $userId): string
    {
        $url = trim($this->host, '/') . str_replace('{id}', (string) $userId, self::ACTIVATE_ACCOUNT);

        return $url;
    }
}