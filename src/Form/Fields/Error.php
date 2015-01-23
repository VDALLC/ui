<?php
namespace Vda\Ui\Form\Fields;

class Error
{
    protected $errorType;

    public function __construct(IFormField $field, $errorType)
    {
        $this->errorType = $errorType;
    }

    public function getErrorString()
    {
        return $this->errorType;
    }
}
