<?php
namespace Vda\Ui\Form\Fields;

use ArrayAccess;

class TextBox extends AbstractFormField
{
    public function fetchValue(ArrayAccess $params)
    {
        $this->value = $params->offsetGet($this->getName());
    }

    public function validate()
    {
        if ($this->isRequired() && !trim($this->value)) {
            //TODO lang strings in code are bad
            return new Error($this, "Please fill {$this->getCaption()}");
        }
        return false;
    }
}
