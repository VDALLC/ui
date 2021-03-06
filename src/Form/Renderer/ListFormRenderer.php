<?php
namespace Vda\Ui\Form\Renderer;

use Vda\Ui\Form\Elements\IHtmlElement;
use Vda\Ui\Form\IForm;
use Vda\Ui\Form\Fields\IFormField;

class ListFormRenderer implements IFormRenderer
{
    protected $types = array();

    public function __construct()
    {
        $this->registerField('Vda\Ui\Form\Fields\TextBox',     'Vda\Ui\Form\Elements\TextArea');
        $this->registerField('Vda\Ui\Form\Fields\TextField',   'Vda\Ui\Form\Elements\TextInput');
        $this->registerField('Vda\Ui\Form\Fields\DateField',   'Vda\Ui\Form\Elements\DatePicker');
        $this->registerField('Vda\Ui\Form\Fields\FileField',   'Vda\Ui\Form\Elements\FileUpload');
        $this->registerField('Vda\Ui\Form\Fields\SelectField', 'Vda\Ui\Form\Elements\Select');
    }

    public function render(IForm $form)
    {
        $res = '';
        $data = $form->getData();
        foreach ($form->getDefinition() as $name => $field) {
            $class = $field->isRequired() ? ' required' : '';
            $caption = $field->getCaption();
            $element = $this->matchElement($field);
            $element->setValue($data[$name]);
            $res .= <<<HTML
<div>
    <label class="{$class}">{$caption}</label>
    {$element->render()}
</div>
HTML;
        }
        return $res;
    }

    /**
     * @todo project depending, move to some DI factory
     *
     * @param IFormField $field
     * @throws \Exception
     * @return IHtmlElement
     */
    protected function matchElement(IFormField $field)
    {
        $fieldClass = get_class($field);
        if (isset($this->types[$fieldClass])) {
            $class = $this->types[$fieldClass];
            return new $class($field);
        } else {
            throw new \Exception("Unregistered field class '{$fieldClass}'");
        }
    }

    public function registerField($fieldClass, $htmlElementClass)
    {
        $this->types[$fieldClass] = $htmlElementClass;
    }
}
