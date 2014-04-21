<?php
namespace Vda\Ui\Form;

use ArrayAccess;
use Vda\Ui\Form\Fields\Error;
use Vda\Ui\Form\Fields\IFormField;

interface IForm
{
    /**
     * @return IFormField[]
     */
    public function getDefinition();

    /**
     * Set source of data to work with.
     *
     * @param ArrayAccess $source
     */
    public function fetchData(ArrayAccess $source);

    /**
     * Examine all fields for errors.
     *
     * todo what to return?
     * * list of fields with errors?
     * * list of error messages?
     * * ...
     *
     * @return Error[] list of errors
     */
    public function validate();

    /**
     * Get data retrieved from source.
     *
     * It is not necessarily validated. Call this method after validate().
     * Invalid data may be useful to pass it back to user to fill.
     *
     * @return array
     */
    public function getData();
}
