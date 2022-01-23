<?php

namespace Nurschool\Notifier\Mailer\Domain\Provider\Traits;

use Nurschool\Notifier\Mailer\Domain\Provider\TemplateRenderer;

trait TemplateRendererAwareTrait
{
    /** @var TemplateRenderer */
    protected $templateRenderer;

    /**
     * @param TemplateRenderer $templateRenderer
     * @return void
     */
    public function setTemplateRenderer(TemplateRenderer $templateRenderer)
    {
        $this->templateRenderer = $templateRenderer;
    }

    /**
     * @return TemplateRenderer
     */
    public function getTemplateRenderer(): TemplateRenderer
    {
        return $this->templateRenderer;
    }
}