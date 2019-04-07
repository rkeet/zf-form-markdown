<?php

namespace Keet\Markdown\Factory\View\Helper;

use Interop\Container\ContainerInterface;
use Keet\Markdown\Service\MarkdownService;
use Keet\Markdown\View\Helper\Markdown;
use Zend\ServiceManager\Factory\FactoryInterface;

final class MarkdownFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var MarkdownService $markdownService */
        $markdownService = $container->get(MarkdownService::class);

        return new Markdown($markdownService);
    }
}
