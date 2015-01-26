<?php
namespace Vda\Ui\Form\Elements;

use Vda\Ui\Form\Fields\IFormField;

abstract class AbstractHtmlInput extends AbstractHtmlElement
{
    protected $value;

    /**
     * @var IFormField
     */
    protected $field;

    public function __construct(IFormField $field)
    {
        $this->field = $field;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }
}
