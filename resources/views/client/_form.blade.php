<?php
$myForm = new App\MyForm();

$myForm->errors = $errors;

$myForm->formText(['label' => 'First Name الاسم', 'name' => 'name1'], ['required' => 'true']);

$myForm->formText(['label' => 'Second Name الأب', 'name' => 'name2']);

$myForm->formText(['label' => 'Third Name الجد', 'name' => 'name3']);

$myForm->formText(['label' => 'Family Name العائلة', 'name' => 'name4']);

$myForm->formText(['label' => 'Notes ملاحظات', 'name' => 'notes']);

$myForm->formText(['label' => 'Mobile No رقم الجوال', 'name' => 'mobile_no']);
?>

<hr>

<?php
$myForm->formButton(['label' => $btnLabel, 'class' => 'primary']);
