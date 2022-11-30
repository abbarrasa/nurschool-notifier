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

final class FullName
{
    private string $firstname;
    private string $lastname;

    public function __construct(string $firstname, string $lastname)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }

    public function firstname(): string
    {
        return $this->firstname;
    }

    public function lastname(): string
    {
        return $this->lastname;
    }
    
    public function __toString(): string
    {
        return trim("{$this->firstname} {$this->lastname}");
    }
}
