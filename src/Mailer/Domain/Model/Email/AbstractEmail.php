<?php

namespace Nurschool\Notifier\Mailer\Domain\Model\Email;

final class AbstractEmail
{
    private $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }
}