<?php
namespace Vda\Ui\Form\Fields;

abstract class AbstractFormField implements IFormField
{
    protected $name, $flags, $caption;

    protected $value;

    /**
     * @param $name
     * @param string $caption todo should be in some l10n/i18n
     * @param int $flags
     */
    public function __construct($name, $caption, $flags = 0)
    {
        $this->name = $name;
        $this->caption = $caption;
        $this->flags = $flags;
    }

    public function getName()
    {
        return $this->name;
    }

    public function isRequired()
    {
        return $this->flags & self::T_REQUIRED;
    }

    public function getCation()
    {
        return $this->caption;
    }

    public function getData()
    {
        return $this->value;
    }
}
