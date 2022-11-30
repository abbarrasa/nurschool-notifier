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

namespace Nurschool\Notifier\Application\Mailer;

use Nurschool\Common\Application\Url\Signature;
use Nurschool\Notifier\Domain\UserAccount;

interface Mailer
{
    public function sendWelcomeEmail(UserAccount $userAccount): void;
    public function sendAccountActivationEmail(UserAccount $userAccount, Signature $signature): void;
    public function sendPasswordResetEmail(UserAccount $userAccount): void;
}