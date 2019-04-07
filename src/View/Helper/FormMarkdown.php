<?php

namespace Keet\Markdown\View\Helper;

use Zend\Form\ElementInterface;
use Zend\Form\Exception\DomainException;
use Zend\Form\View\Helper\FormInput;
use Zend\Form\View\Helper\FormTextarea;

final class FormMarkdown extends FormInput
{
    /**
     * @var string
     */
    protected $inputTextarea = '<textarea %s>%s</textarea>';

    /**
     * @var string
     */
    protected $previewContainer = '<div %1$s></div>';

    /**
     * Attributes valid for the input tag
     *
     * @var array
     */
    protected $validTagAttributes = [
        'autocomplete' => true,
        'autofocus'    => true,
        'cols'         => true,
        'dirname'      => true,
        'disabled'     => true,
        'form'         => true,
        'maxlength'    => true,
        'name'         => true,
        'placeholder'  => true,
        'readonly'     => true,
        'required'     => true,
        'rows'         => true,
        'wrap'         => true,
    ];

    protected $validTypes = [
        'markdown' => true,
    ];

    /**
     * Invoke helper as functor
     *
     * Proxies to {@link render()}.
     *
     * @param ElementInterface|null $element
     *
     * @return string|FormTextarea
     */
    public function __invoke(ElementInterface $element = null)
    {
        if (! $element) {
            return $this;
        }

        $this->view->inlineScript()->appendFile($this->view->basePath('assets/js/showdown.js'), 'text/javascript');

        return $this->render($element);
    }

    /**
     * Render a form <textarea> element from the provided $element
     *
     * @param ElementInterface $element
     *
     * @return string
     * @throws DomainException
     */
    public function render(ElementInterface $element)
    {
        $name = $element->getName();
        if (empty($name) && $name !== 0) {
            throw new DomainException(
                sprintf(
                    '%s requires that the element has an assigned name; none discovered',
                    __METHOD__
                )
            );
        }

        $attributes                        = $element->getAttributes();
        $attributes['name']                = $name;
        $attributes['data-markdown-input'] = '';
        $content                           = (string) $element->getValue();
        $escapeHtml                        = $this->getEscapeHtmlHelper();

        return sprintf(
            '%s%s',
            sprintf(
                $this->inputTextarea,
                $this->createAttributesString($attributes),
                $escapeHtml($content)
            ),
            sprintf($this->previewContainer, sprintf('data-for="%s"', $element->getName()))
        );
    }
}
