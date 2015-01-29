<?php
namespace Vda\Ui\Form\Fields;

use ArrayAccess;

class SelectField extends AbstractFormField
{
    protected $options;

    public function __construct($name, $caption, $options, $flags = 0)
    {
        parent::__construct($name, $caption, $flags);

        $this->options = $options;
    }

    public function fetchValue(ArrayAccess $params)
    {
        $this->value = $params->offsetGet($this->getName());
    }

    public function validate()
    {
        $val = $this->value;
        $options = array_filter($this->options, function($o) use ($val) { return $o->getValue() == $val; } );

        if (empty($options) || ($this->isRequired() && reset($options)->isZero())) {
            //TODO lang strings in code are bad
            return new Error($this, "Please choose a valid option for {$this->getCaption()}");
        }

        return false;
    }

    public function getOptions()
    {
        return $this->options;
    }
}
