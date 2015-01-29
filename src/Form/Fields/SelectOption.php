<?php
namespace Vda\Ui\Form\Fields;

class SelectOption
{
    protected $value;
    protected $caption;
    protected $isZero;

    public function __construct($value, $caption, $isZero = false)
    {
        $this->value = $value;
        $this->caption = $caption;
        $this->isZero = $isZero;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getCaption()
    {
        return $this->caption;
    }

    public function isZero()
    {
        return $this->isZero;
    }
}
