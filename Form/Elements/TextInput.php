<?php
namespace Vda\Ui\Form\Elements;

class TextInput extends AbstractHtmlElement
{
    public function render()
    {
        $name = $this->field->getName();
        $res = <<<HTML
<input type="text" name="{$name}" value="{$this->value}">
HTML;
        return $res;
    }
}
