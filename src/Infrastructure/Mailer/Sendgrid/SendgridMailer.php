<?php

declare(strict_types=1);

namespace Nurschool\Notifier\Infrastructure\Mailer\Sendgrid;

use Nurschool\Notifier\Application\Mailer\Mailer;
use Nurschool\Common\Application\Url\Signature;
use Nurschool\Notifier\Infrastructure\Mailer\Sendgrid\Provider\SendgridProvider;
use Nurschool\Notifier\Domain\UserAccount;
use Nurschool\Notifier\Infrastructure\Mailer\Sendgrid\Exception\SendgridException;

final class SendgridMailer implements Mailer
{
    private SendgridProvider $provider;
    private array $configEmails;

    public function __construct(SendgridProvider $provider, array $configEmails)
    {
        $this->provider = $provider;
        $this->configEmails = $configEmails;
    }

    public function sendWelcomeEmail(UserAccount $userAccount): void
    {

    }

    public function sendAccountActivationEmail(UserAccount $userAccount, Signature $signature): void
    {
        $email = (string) $userAccount->email();
        $fullName = $userAccount->fullName(); 
        $url = $signature->getSignedUrl();
        $expiresAt = $signature->expiresAt();
        $templateId = $this->getTemplateIdFor(__FUNCTION__);
        $senderAddress = $this->getSenderAddressFor(__FUNCTION__);
        $senderName = $this->getSenderNameFor(__FUNCTION__);
        $subject = $this->getSubjectFor(__FUNCTION__);

        $email = $this->provider->createMailForTransactionalTemplate(
            [$email => (string) $fullName],
            [$senderAddress, $senderName],
            $subject,
            $templateId,
            [
                'name' => $fullName->firstname(),
                'url' => $url,
                'expiresAt' => ''
            ]
        );

        $this->provider->sendMail($email);
    }

    public function sendPasswordResetEmail(UserAccount $userAccount): void
    {

    }

    private function getTemplateIdFor(string $name): string
    {
        $templateId = $this->configEmails[$name]['template'] ?? null;
        if (empty($templateId)) {
            throw new SendgridException(sprintf("No template defined for '%s'", $name));
        }

        return $templateId;
    }

    private function getSenderAddressFor(string $name): string
    {
        $address = $this->configEmails[$name]['sender']['address'] ?? null;
        if (empty($address)) {
            throw new SendgridException(sprintf("No sender address defined for '%s'", $name));
        }

        return $address;
    }

    private function getSenderNameFor(string $name): string
    {
        return $this->configEmails[$name]['sender']['name'] ?? '';
    }

    private function getSubjectFor(string $name): string
    {
        return $this->configEmails[$name]['subject'] ?? '';
    }    
}