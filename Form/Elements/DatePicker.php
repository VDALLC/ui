<?php
namespace Vda\Ui\Form\Elements;

use Vda\Ui\Form\Fields\IFormField;

class DatePicker extends AbstractHtmlInput
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
        $attrs = $this->renderAttributes(array(
            'id'    => $id,
            'type'  => 'text',
            'name'  => $name,
            'value' => $this->value,
        ));
        $res = <<<HTML
<input {$attrs}>
<script type="text/javascript">
if (window.$) {
    $(function() {
        $("#{$id}").datepicker({
            dateFormat: '{$this->format}',
            changeMonth: true,
            changeYear: true,
            yearRange: "1900:{$year}"
        });
    });
}
</script>
HTML;
        return $res;
    }
}
