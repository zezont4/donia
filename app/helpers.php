<?php

function yes_no()
{
	return
		[
			1 => 'Yes نعم',
			0 => 'No لا'
		];
}

function getColWidthClass($width)
{
	$colWidth = [
		2  => 'col-sm-6 col-md-2',
		3  => 'col-xs-12 col-sm-6 col-md-3',
		4  => 'col-sm-6 col-md-4',
		6  => 'col-sm-12 col-md-6',
		12 => 'col-xs-12'
	];
	return $colWidth[$width];

}

function ifActive($routeName, $active = 'active')
{
	$url = route($routeName);
	return Request::url() == $url ? $active : '';
}

function addForm_controlClass(Array $attr = null)
{
	if ($attr) {
		if (array_key_exists('class', $attr)) {
			$attr['class'] .= ' form-control';
		} else {
			$attr += ['class' => 'form-control'];
		}
	} else {
		$attr['class'] = 'form-control';
	}

	return $attr;
}

function formText(Array $options, Array $formElementAttr = null)
{
	generateFormElement('text', $options, $formElementAttr);
}

function formRadio(Array $options, Array $formElementAttr = null)
{
	generateFormElement('radio', $options, $formElementAttr);
}

function generateFormElement($type, Array $options, Array $formElementAttr = null)
{
	$labelWidth = isset($options['Width']) ? $options['Width'] : 3;
	$inputWidth = 12 - $labelWidth;
	$errors = isset($options['errors']) ? $options['errors'] : Null;
	if ($errors) {
		$error_class = $errors->has($options['name']) ? 'has-error' : '';
	}
	$formElementAttr = addForm_controlClass($formElementAttr);
	echo "<div class='form-group {@$error_class}'>";

	if (isset($options['label'])) {
		echo Form::label($options['name'], $options['label'], ['class' => 'control-label col-sm-' . $labelWidth]);
	} else {
		echo "<div class='col-sm-offset{$labelWidth} col-sm-{$inputWidth}'>";
	}

	echo "<div class='col-sm-{$inputWidth}'>";

	if ($type == 'text') {
		echo Form::text($options['name'], null, $formElementAttr);
	} else if ($type == 'date') {

	} else if ($type == 'radio') {

	} else if ($type == 'select') {
		echo Form::select($options['name'], $options['values'], null, $formElementAttr);
	} else if ($type == 'check') {

	} else if ($type == 'static') {

	}


	echo "</div>";
	//echo $errors->first($name, '<span class="help-block">:message</span>');

	echo "</div>";

}

function createFormText($name, $label, $errors, $Width = '3', Array $attr = null)
{
	$error_class = $errors->has($name) ? 'has-error' : '';
	$attr = addForm_controlClass($attr); ?>
	<div class="form-group <?php echo $error_class; ?>">
		<?php echo $label ? Form::label($name, $label, ['class' => 'control-label col-sm-' . $Width]) : ''; ?>
		<div class="col-sm-<?php echo 12 - $Width; ?>">
			<?php echo Form::text($name, null, $attr); ?>
		</div>
		<?php //echo $errors->first($name, '<span class="help-block">:message</span>');
		?>
	</div>
	<?php
}

function createFormSelect($name, $label, $errors, $Width = '3', $values, $attr = null)
{
	$error_class = ($errors->has($name)) ? 'has-error' : '';
	$attr = addForm_controlClass($attr); ?>
	<div class="form-group <?php echo $error_class; ?>">
		<?php echo $label ? Form::label($name, $label, ['class' => 'control-label col-sm-' . $Width]) : ''; ?>

		<div class="col-sm-<?php echo 12 - $Width; ?>">
			<?php echo Form::select($name, $values, null, $attr); ?>
		</div>
		<?php //echo $errors->first($name, '<span class="help-block">:message</span>');
		?>
	</div>
	<?php
}

function createFormRadio($name, $label, $errors, $values, $Width = '3', $attr = null)
{
	$error_class = ($errors->has($name)) ? 'has-error' : ''; ?>
	<div class="form-group <?php echo $error_class; ?>">
		<?php echo Form::label($name, $label, ['class' => 'control-label col-sm-' . $Width]) ?>
		<div class="col-sm-<?php echo 12 - $Width; ?>">
			<div class="row">
				<div class="col-xs-12 btn-group" data-toggle="buttons">
					<?php
					$radioWidth = 100 / count($values);
					foreach ($values as $key => $val) { ?>
						<label class="btn btn-default" style="width: <?php echo $radioWidth; ?>%">
							<?php $attr['id'] = $name . $key; ?>
							<?php echo Form::radio($name, $key, null, $attr); ?>
							<?php echo $val; ?>
						</label>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php //echo $errors->first($name, '<span class="help-block">:message</span>');
		?>
	</div>
	<?php
}

function createFormRadio1($name, $label, $errors, $values, $Width = '3', $attr = null)
{
	$error_class = ($errors->has($name)) ? 'has-error' : ''; ?>
	<div class="form-group <?php echo $error_class; ?>">
		<?php echo Form::label($name, $label, ['class' => 'control-label col-sm-' . $Width]) ?>
		<div class="col-sm-<?php echo 12 - $Width; ?>">
			<?php
			foreach ($values as $key => $val) { ?>
				<label class="radio-inline">
					<?php $attr['id'] = $name . $key; ?>
					<?php echo Form::radio($name, $key, null, $attr); ?>
					<?php echo $val; ?>
				</label>
			<?php } ?>
		</div>
		<?php //echo $errors->first($name, '<span class="help-block">:message</span>');
		?>
	</div>
	<?php
}

function createFormButton($label, $state_class = 'default', $Width = 3)
{ ?>
	<div class="form-group">
		<div class="col-sm-offset-<?php echo $Width; ?> col-sm-<?php echo(12 - $Width); ?>">
			<?php echo Form::submit($label, ['class' => 'btn material_button btn-' . $state_class]); ?>
		</div>
	</div>
	<?php
}

function createFormDate($name, $label, $errors, $Width = '3', $attr = null)
{
	$error_class = ($errors->has($name)) ? 'has-error' : '';
	$attr = addForm_controlClass($attr); ?>
	<div class="form-group <?php echo $error_class; ?>">
		<?php echo $label ? Form::label($name, $label, ['class' => 'control-label col-sm-' . $Width, 'data-date-format' => 'dd-mm-yyyy']) : ''; ?>
		<div class="col-sm-<?php echo 12 - $Width; ?>">
			<div class='input-group date' id='<?php echo $name . 'id'; ?>'>
				<span class="input-group-addon"><i class="fa fa-lg fa-calendar"></i></span>
				<?php echo Form::text($name, null, $attr); ?>
			</div>
		</div>
		<?php //echo $errors->first($name, '<span class="help-block">:message</span>');
		?>
	</div>
	<script type="text/javascript">
		$(function () {
			$('#<?php echo $name.'id';?>').datetimepicker({
				icons: {
					time: "fa fa-clock-o",
					date: "fa fa-calendar",
					up: "fa fa-arrow-up",
					down: "fa fa-arrow-down"
				},
				format: 'YYYY-MM-DD HH:mm:ss'
			});
		});
	</script>

	<?php
}

function createFormStatic($value, $label, $Width = '3')
{ ?>
	<div class="form-group">
		<?php echo $label ? Form::label('S1', $label, ['class' => 'control-label col-sm-' . $Width]) : ''; ?>
		<div class="col-sm-<?php echo 12 - $Width; ?>">
			<p class="form-control-static"><?php echo $value; ?></p>
		</div>
	</div>
	<?php
}


/**
 * convert #vars# to client name and so..
 *
 * @param $originalMessage
 * @param null $contract_id if available , then will search for client name and device name.
 * @param null $client_id if available , then will search for client name only.
 * @return string
 */
function convertSMSVariables($originalMessage, $contract_id = null, $client_id = null)
{
	$msgContent = $originalMessage;
	$clientVar = '#عميل#';
	$deviceVar = '#جهاز#';
	if ($contract_id && !$client_id) {
		$contract = \App\Contract::with('client')->findOrFail($contract_id);
		$msgContent = str_replace($clientVar, $contract->client->name1, $originalMessage);
		$msgContent = str_replace($deviceVar, $contract->device_name, $msgContent);
	} elseif (!$contract_id && $client_id) {
		$client = \App\Client::findOrFail($client_id);
		$msgContent = str_replace($clientVar, $client->name1, $originalMessage);
	}

	return $msgContent;
}

/**
 * get SMS message text from DB.
 *
 * @param $SMS_message_id
 * @return string
 */
function getSMSMessageByID($SMS_message_id)
{
	$sms = \App\Sms::findOrFail($SMS_message_id);

	return $sms->message;
}