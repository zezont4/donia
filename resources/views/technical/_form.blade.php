@inject('myForm','App\MyForm()')

<?php $myForm->errors = $errors;?>

{!! $myForm->formText(['label' => 'الاسم', 'name' => 'name']) !!}

<hr>

{!! $myForm->formButton(['label' => $btnLabel, 'class' => 'primary']) !!}