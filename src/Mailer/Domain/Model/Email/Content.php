<?php

namespace Nurschool\Notifier\Mailer\Domain\Model\Email;

interface Content
{
    public function get(): string;
}