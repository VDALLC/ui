<?php

use Vda\Ui\Form\Fields\IFormField;
use Vda\Ui\Form\Fields\TextField;

class FormFieldFlagsTestClass extends PHPUnit_Framework_TestCase
{
    const CUSTOM_FLAG1 = 1073741824; // 1 << 30
    const CUSTOM_FLAG2 = 536870912; // 1 << 30

    public function testCustomFlags()
    {
        $field = new TextField('test', 'test');
        $this->assertFalse($field->testFlag(self::CUSTOM_FLAG1));
        $this->assertFalse($field->testFlag(self::CUSTOM_FLAG2));

        $field = new TextField('test', 'test', self::CUSTOM_FLAG1);
        $this->assertTrue($field->testFlag(self::CUSTOM_FLAG1));
        $this->assertFalse($field->testFlag(self::CUSTOM_FLAG2));

        $field = new TextField('test', 'test', self::CUSTOM_FLAG1 | self::CUSTOM_FLAG2);
        $this->assertTrue($field->testFlag(self::CUSTOM_FLAG1));
        $this->assertTrue($field->testFlag(self::CUSTOM_FLAG2));
    }

    public function testRequired()
    {
        $field = new TextField('test', 'test', IFormField::T_REQUIRED);
        $this->assertTrue($field->isRequired());
    }

    public function testNotRequired()
    {
        $field = new TextField('test', 'test');
        $this->assertFalse($field->isRequired());
    }
}
