<?php
namespace Vda\Ui\Form\Elements;

abstract class AbstractHtmlElement implements IHtmlElement
{
    protected $attributes = array();

    public function setAttribute($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    protected function renderAttributes($extra = array())
    {
        $res = '';
        foreach (array_merge($this->attributes, $extra) as $name => $value) {
            $res .= ' ' . $name . '="' . htmlspecialchars($value) . '"';
        }
        return $res;
    }
}
