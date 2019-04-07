# ZF Form Element Markdown

Provides the ability to use `markdown` as a type of input element. 

## Usage in Form / Fieldset

Element provides an HTML `<textarea>` element and paired `<div>` element to render
a preview of whatever is entered in text area. 

    use Keet\Markdown\Form\Element\Markdown;
    
    ...

    $this->add(
        [
            'name'       => 'body',
            'type'       => Markdown::class,
            'options'    => [
                'label' => _('Body'),
            ],
            'attributes' => [
                'class' => 'form-control',
                'rows'  => 4,
            ],
        ]
    );

### Module requirements:

* [Zend Form](https://github.com/zendframework/zend-form) to extend
* [Parsedown](https://github.com/erusev/parsedown) for PHP side parsing to HTML
* [ShowdownJS](https://github.com/showdownjs/showdown) for client side parsing to HTML for preview
* [AssetManager](https://github.com/RWOverdijk/AssetManager) to inject JS with ViewHelper

### Features

* Provides Service (`MarkdownService`) for handling markdown conversion server-side
* Provides a ZF Form Element (`Markdown`) for Form input
  * Provides Showdown to client when using `Markdown` Form Element

### TODO's

* Create better preview - possibly:
  * option: inject some overridable default styling
  * option: side-by-side preview instead of above/below
  * option: minimum (overridable) styling to always have a visible preview container
* Figure out incompatibilities between Parsedown and ShowdownJS
