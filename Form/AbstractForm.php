<?php
namespace Vda\Ui\Form;

use ArrayAccess;
use Vda\Ui\Form\Fields\IFormField;

abstract class AbstractForm implements IForm
{
    /**
     * @var IFormField[]
     */
    protected $definition;

    public function __construct(array $definition)
    {
        $this->definition = $definition;
    }

    public function getDefinition()
    {
        return $this->definition;
    }

    public function fetchData(ArrayAccess $source)
    {
        foreach ($this->getDefinition() as $field) {
            $field->fetchValue($source);
        }
    }

    public function validate()
    {
        $res = array();
        foreach ($this->getDefinition() as $field) {
            $error = $field->validate();
            if ($error) {
                $res[] = $error;
            }
        }
        return $res;
    }

    public function getData()
    {
        $res = array();
        foreach ($this->getDefinition() as $name => $field) {
            $res[$name] = $field->getData();
        }
        return $res;
    }
}
