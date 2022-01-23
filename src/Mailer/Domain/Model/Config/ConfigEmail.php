<?php

namespace Nurschool\Notifier\Mailer\Domain\Model\Config;

class ConfigEmail
{
    public const ID_EMAIL_CONFIRMATION = 'email_confirmation';

    /** @var string */
    private $id;

    /** @var string */
    private $template;

    /** @var string */
    private $subject;

    /** @var string */
    private $address;

    /** @var string */
    private $name;

    public function __construct(
        string $id,
        string $template,
        string $subject,
        string $address,
        string $name
    ) {
        if ($id !== self::ID_EMAIL_CONFIRMATION) {
            throw new \Exception(sprintf('"%s" id email configuration invalid'));
        }

        $this->id = $id;
        $this->template = $template;
        $this->subject = $subject;
        $this->address = $address;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTemplate(): string
    {
        return $this->template;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

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
}