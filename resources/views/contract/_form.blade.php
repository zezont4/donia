<?php
$myForm = new App\MyForm();
$myForm->errors = $errors;
?>

<legend class="h5 text-primary">Receipt details - بيانات الاستلام</legend>

<?php
$myForm->formSelect(['label' => 'Recipient Name - الفني المستلم', 'name' => 'recipient_id', 'values' => ['' => 'Choose from list اختر من القائمة '] + $tech_list]);

if ($formType == 'edit') {
    $myForm->formText(['label' => 'created at تاريخ الاستلام', 'name' => 'created_at'], ['readonly' => 'readonly']);
}

$myForm->formText(['label' => 'Device Type - نوع الجهار', 'name' => 'device_name']);

$myForm->formText(['label' => 'Requirements - المطلوب', 'name' => 'required']);

$myForm->formText(['label' => 'Apps Needed - البرامج المطلوبة', 'name' => 'apps_needed']);

$myForm->formText(['label' => 'Accessories - الملحقات', 'name' => 'accessories']);

$myForm->formButton(['label' => 'Update Recipient Details - تحديث بيانات الاستلام', 'class' => 'primary']);


if( $formType == 'edit'){ ?>
<div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
        <a href="{!! route('contract.show1',['contract_id' => $contract->id]) !!}" class="btn btn-success">Print طباعة</a>
    </div>
</div>
<?php } ?>

<br>

<?php echo Form::close();

if( $formType == 'edit'){

echo Form::model($contract, ['route' => ['contract.update', $contract->id], 'method' => 'put', 'class' => 'form-horizontal']);
?>
<legend class="text-primary">Repair Result نتيجة الصيانة</legend>

<?php
echo Form::hidden('created_at', null);

$myForm->formDate(['label' => 'Check at - تاريخ الفحص', 'name' => 'fixed_at']);

$myForm->formRadio(['label' => '?Is Repaired - هل تمت الصيانة?', 'name' => 'is_repaired', 'values' => $myForm->yes_no]);

$myForm->formText(['label' => 'why not fixed - سبب عدم الصيانة', 'name' => 'why_not_fixed']);

$myForm->formText(['label' => 'Work - ماتم عمله', 'name' => 'work']);

$myForm->formText(['label' => 'Hardware - قطع الغيار المركبة', 'name' => 'hardware']);

$myForm->formSelect(['label' => 'Technical Name - فني الصيانة', 'name' => 'technical_id', 'values' => ['' => 'Choose from list اختر من القائمة '] + $tech_list]);

$myForm->formText(['label' => 'Cost - التكلفة', 'name' => 'money']);
?>

<legend class="h5 text-primary">Deliver details - بيانات التسليم</legend>

<?php
$myForm->formDate(['label' => 'delivered at - تاريخ التسليم', 'name' => 'delivered_at']);

$myForm->formRadio(['label' => '?Is Delivered - هل تم التسليم', 'name' => 'is_delivered', 'values' => $myForm->yes_no]);

$myForm->formText(['label' => 'client Recipient name - اسم المستلم', 'name' => 'client_Recipient_name']);
?>
<hr>
<div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
        <label class="h4 text-primary">
            {!!Form::checkbox('send_sms', 1, 1)!!}
            ?SMS - إرسال رسالة؟
        </label>
    </div>
</div>

<?php
$myForm->formButton(['label' => $btnLabel, 'class' => 'primary']);

if( $formType == 'edit'){?>
<div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
        <a href="{{ route('contract.show',['contract_id' => $contract->id]) }}" class="btn btn-success">Print طباعة</a>
    </div>
</div>
<?php }

echo Form::close();
}