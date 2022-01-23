<?php

namespace Nurschool\Notifier\Mailer\Domain\Model\Email;

final class Message
{
    /** @var string */
    private $subject;

    /** @var Content  */
    private $content;

    /** @var array  */
    private $attachments = [];

    public function __construct(string $subject, Content $content)
    {
        $this->subject = $subject;
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @return Content
     */
    public function getContent(): Content
    {
        return $this->content;
    }

    /**
     * @return array
     */
    public function getAttachments(): array
    {
        return $this->attachments;
    }

    /**
     * @param string $attachment
     */
    public function addAttachment(string $attachment): void
    {
        $this->attachments[] = $attachment;
    }
}