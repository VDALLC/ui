<?php
namespace Vda\Ui\Form\Fields;

use ArrayAccess;

interface IFormField
{
    // bit field. 1, 2, 4, 8...
    const T_REQUIRED = 1;

    public function getName();
    public function testFlag($flag);
    public function isRequired();
    public function getCaption();

    public function fetchValue(ArrayAccess $params);

    public function validate();

    /**
     * This is the place to handle file uploads.
     *
     * @return mixed value
     */
    public function getData();
}