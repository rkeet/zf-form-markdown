<?php

namespace Keet\Markdown\Factory\Form\Element;

use Interop\Container\ContainerInterface;
use Keet\Markdown\View\Helper\FormMarkdown;
use Zend\Form\View\Helper\FormElement;
use Zend\ServiceManager\Factory\FactoryInterface;

final class FormElementFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $formElement = new FormElement();
        $formElement->addType('markdown', FormMarkdown::class);

        return $formElement;
    }
}
