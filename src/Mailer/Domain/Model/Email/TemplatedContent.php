<?php

namespace Nurschool\Notifier\Mailer\Domain\Model\Email;

final class TemplatedContent implements Content
{
    private $template;

    private $context;

    public function __construct(string $template, array $context = [])
    {
        $this->template = $template;
        $this->context = $context;
    }

    public function get(): string
    {
        return $this->template;
    }

    /**
     * @return array
     */
    public function getContext(): array
    {
        return $this->context;
    }

    /**
     * @param array $context
     */
    public function setContext(array $context): void
    {
        $this->context = $context;
    }
}