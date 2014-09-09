<?php
namespace Vda\Ui\Form\Elements;

class TextInput extends AbstractHtmlInput
{
    public function render()
    {
        $attrs = $this->renderAttributes(array(
            'type' => 'text',
            'name' => $this->field->getName(),
            'value' => $this->value,
        ));
        return "<input {$attrs}>";
    }
}
