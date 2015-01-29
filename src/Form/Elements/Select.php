<?php
namespace Vda\Ui\Form\Elements;

class Select extends AbstractHtmlInput
{
    public function render()
    {
        $attrs = $this->renderAttributes(array(
            'name' => $this->field->getName(),
        ));
        $result =  "<select {$attrs}>";

        foreach ($this->field->getOptions() as $o) {
            $selected = ($this->value == $o->getValue())
                ? ' selected="selected"'
                : '';

            $result .= '<option value="' . htmlspecialchars($o->getValue()) .
                "\"{$selected}>" . htmlspecialchars($o->getCaption()) . '</option>';
        }

        $result .= "</select>";

        return $result;
    }
}
