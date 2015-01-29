<?php
namespace Vda\Ui\Form\Elements;

class TextArea extends AbstractHtmlInput
{
    public function render()
    {
        $attrs = $this->renderAttributes(array(
            'name' => $this->field->getName(),
        ));
        return "<textarea {$attrs}>" . htmlspecialchars($this->value) . '</textarea>';
    }
}
