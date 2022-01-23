<?php

namespace Nurschool\Notifier\Mailer\Domain\Model\Email;

final class Address
{
    /** @var string */
    private $address;

    /** @var string */
    private $name;

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string[]
     */
    public function toArray(): array
    {
        if (!empty($this->name)) {
            return [ $this->name => $this-> address];
        }

        return [ $this->address ];
    }
}