<?php

/*
 * This file is part of the Nurschool Notifier component of Nurschool project.
 *
 * (c) Nurschool Notifier <https://github.com/abbarrasa/nurschool-notifier>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nurschool\Notifier\Mailer\Domain\Provider;

use Nurschool\Notifier\Mailer\Domain\Model\Email\AbstractEmail;
use Nurschool\Notifier\Mailer\Domain\Model\Email\Address;
use Nurschool\Notifier\Mailer\Domain\Model\Email\Message;

interface MailProvider
{
    /**
     * @param Address[] $to
     * @param Address $from
     * @param Message $message
     * @return AbstractEmail
     */
    public function createEmail(array $to, Address $from, Message $message): AbstractEmail;

    /**
     * @param AbstractEmail $email
     * @return mixed
     */
    public function sendEmail(AbstractEmail $email);
}