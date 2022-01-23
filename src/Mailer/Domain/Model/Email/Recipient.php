<?php

namespace Nurschool\Notifier\Mailer\Domain\Model\Email;

final class Recipient
{
    /** @var Address */
    private $address;

    /** @var bool */
    private $cco;

    public function __contruct(Address $address, bool $cco = false)
    {
        $this->address = $address;
        $this->cco = $cco;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @return bool
     */
    public function isCoo(): bool
    {
        return $this->cco;
    }
}