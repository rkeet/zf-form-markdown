<?php

namespace Keet\Markdown\Adapter;

use Keet\Markdown\Interfaces\MarkdownAdapterInterface;
use Parsedown;

final class ParsedownAdapter implements MarkdownAdapterInterface
{
    /**
     * @var Parsedown
     */
    private $parsedown;

    public function __construct()
    {
        $this->setParsedown(new Parsedown());
    }

    public function __invoke(string $markdown): string
    {
        return $this->markdownToHtml($markdown);
    }

    public function markdownToHtml(string $markdown): string
    {
        return $this->getParsedown()->text($markdown);
    }

    private function getParsedown(): Parsedown
    {
        return $this->parsedown;
    }

    private function setParsedown(Parsedown $parsedown): ParsedownAdapter
    {
        $this->parsedown = $parsedown;

        return $this;
    }

}
