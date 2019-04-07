<?php

namespace Keet\Markdown;

use Keet\Markdown\Adapter\ParsedownAdapter;
use Keet\Markdown\Factory\Form\Element\FormElementFactory;
use Keet\Markdown\Factory\Service\MarkdownServiceFactory;
use Keet\Markdown\Factory\View\Helper\MarkdownFactory;
use Keet\Markdown\Form\Element\Markdown;
use Keet\Markdown\Service\MarkdownService;
use Keet\Markdown\View\Helper\FormMarkdown;
use Keet\Markdown\View\Helper\Markdown as MarkdownViewHelper;
use Zend\Form\View\Helper\FormElement;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'form_elements'   => [
        'aliases'   => [
            'markdown' => Markdown::class,
        ],
        'factories' => [
            Markdown::class => InvokableFactory::class,
        ],
    ],
    'service_manager' => [
        'aliases'   => [
            'markdown_adapter' => ParsedownAdapter::class,
        ],
        'factories' => [
            // Adapters
            ParsedownAdapter::class => InvokableFactory::class,
            // Services
            MarkdownService::class  => MarkdownServiceFactory::class,
        ],
    ],
    'view_helpers'    => [
        'aliases'   => [
            'form_mark_down' => FormMarkdown::class,
            'formmarkdown'   => FormMarkdown::class,
            'formMarkdown'   => FormMarkdown::class,
            'formMarkDown'   => FormMarkdown::class,
            'markdown'       => MarkdownViewHelper::class,
        ],
        'factories' => [
            // ViewHelpers
            FormMarkdown::class       => InvokableFactory::class,
            MarkdownViewHelper::class => MarkdownFactory::class,
            // Overrides
            FormElement::class        => FormElementFactory::class,
        ],
    ],
];
