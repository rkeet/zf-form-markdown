<?php

namespace Keet\Markdown\Factory\Service;

use Interop\Container\ContainerInterface;
use Keet\Markdown\Interfaces\MarkdownAdapterInterface;
use Keet\Markdown\Service\MarkdownService;
use Zend\ServiceManager\Factory\FactoryInterface;

final class MarkdownServiceFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var MarkdownAdapterInterface $adapter */
        $adapter = $container->get('markdown_adapter');

        return new MarkdownService($adapter);
    }
}
