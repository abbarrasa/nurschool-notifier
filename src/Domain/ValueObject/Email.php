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

namespace Nurschool\Notifier\Domain\ValueObject;

final class Email
{
    private string $value;

    /**
     * Email constructor.
     */
    public function __construct(string $email)
    {
        $this->value = $email;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
