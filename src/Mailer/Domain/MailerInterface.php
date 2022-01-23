<?php

/*
 * This file is part of the Nurschool Notifier component of Nurschool project.
 *
 * (c) Nurschool Notifier <https://github.com/abbarrasa/nurschool-notifier>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Nurschool\Notifier\Mailer\Domain;

interface MailerInterface
{
    public function sendConfirmationEmail(string $email, string $signedUrl, \DateTimeInterface $expiresAt, array $parameters = []);
    public function sendResettingPasswordEmail();
}