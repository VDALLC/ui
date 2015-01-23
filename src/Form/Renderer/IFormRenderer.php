<?php
namespace Vda\Ui\Form\Renderer;

use Vda\Ui\Form\IForm;

interface IFormRenderer
{
    public function render(IForm $form);
    public function registerField($fieldClass, $htmlElementClass);
}
