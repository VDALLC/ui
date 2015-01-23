<?php
namespace Vda\Ui\Form\Elements;

/**
 * Interface IHtmlElement
 *
 * @todo move to Vda\Html?
 * @package Vda\Ui\Form\Elements
 */
interface IHtmlElement
{
    public function setAttribute($name, $value);
    public function setValue($value);
    public function render();
}
