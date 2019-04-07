<?php

namespace Keet\Markdown\Interfaces;

interface MarkdownAdapterInterface
{
    public function markdownToHtml(string $markdown): string;
}
