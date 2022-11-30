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

namespace Nurschool\Notifier\Domain;

use Nurschool\Common\Domain\ValueObject\Uuid;
use Nurschool\Notifier\Domain\ValueObject\Email;
use Nurschool\Notifier\Domain\ValueObject\FullName;

class UserAccount
{
    private Uuid $id;
    private Email $email;
    private FullName $fullName;

    public function __construct(Uuid $id, Email $email, FullName $fullName)
    {
        $this->id = $id;
        $this->email = $email;
        $this->fullName = $fullName;
    }

    public function id(): Uuid
    {
        return $this->id;
    }

    public function email(): Email
    {
        return $this->email;
    }

    public function fullName(): FullName
    {
        return $this->fullName;
    }
}
