<?php

namespace Keet\Markdown\Service;

use Keet\Markdown\Interfaces\MarkdownAdapterInterface;

final class MarkdownService implements MarkdownAdapterInterface
{
    /**
     * @var MarkdownAdapterInterface
     */
    private $adapter;

    public function __construct(MarkdownAdapterInterface $adapter)
    {
        $this->setAdapter($adapter);
    }

    public function markdownToHtml(string $markdown): string
    {
        return $this->getAdapter()->markdownToHtml($markdown);
    }

    private function getAdapter(): MarkdownAdapterInterface
    {
        return $this->adapter;
    }

    private function setAdapter(MarkdownAdapterInterface $adapter): MarkdownService
    {
        $this->adapter = $adapter;

        return $this;
    }

}
