<?php
namespace Vda\Ui\Form\Elements;

use Vda\Ui\Form\Fields\IFormField;

class DatePicker extends AbstractHtmlElement
{
    protected $format;

    public function __construct(IFormField $field, $format = 'yy-mm-dd')
    {
        parent::__construct($field);
        $this->format = $format;
    }

    public function render()
    {
        $name = $this->field->getName();
        $id = uniqid();
        $year = date('Y');
        $res = <<<HTML
<input id="{$id}" type="text" name="{$name}" value="{$this->value}">
<script type="text/javascript">
$(function() {
    $( "#{$id}" ).datepicker({
        dateFormat: '{$this->format}',
        changeMonth: true,
        changeYear: true,
        yearRange: "1900:{$year}"
    });
});
</script>
HTML;
        return $res;
    }
}
