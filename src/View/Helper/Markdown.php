<?php

namespace Keet\Markdown\View\Helper;

use Keet\Markdown\Service\MarkdownService;
use Zend\View\Helper\AbstractHelper;

final class Markdown extends AbstractHelper
{
    /**
     * @var MarkdownService
     */
    protected $markdownService;

    public function __construct(MarkdownService $markdownService)
    {
        $this->setMarkdownService($markdownService);
    }

    public function __invoke(string $markdown): string
    {
        return $this->getMarkdownService()->markdownToHtml($markdown);
    }

    private function getMarkdownService(): MarkdownService
    {
        return $this->markdownService;
    }

    private function setMarkdownService(MarkdownService $markdownService): Markdown
    {
        $this->markdownService = $markdownService;

        return $this;
    }
}
