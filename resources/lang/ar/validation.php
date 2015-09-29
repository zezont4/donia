<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    "accepted"             => "The :attribute must be accepted.",
    "active_url"           => "The :attribute is not a valid URL.",
    "after"                => "<i>[ :attribute ]</i> :  : This field must be a date after :date. - هذا الحقل يجب أن يكون بعد الحقل التالي: :date",
    "alpha"                => "The :attribute may only contain letters.",
    "alpha_dash"           => "The :attribute may only contain letters, numbers, and dashes.",
    "alpha_num"            => "The :attribute may only contain letters and numbers.",
    "array"                => "The :attribute must be an array.",
    "before"               => "The :attribute must be a date before :date.",
    "between"              => [
        "numeric" => "The :attribute must be between :min and :max.",
        "file"    => "The :attribute must be between :min and :max kilobytes.",
        "string"  => "The :attribute must be between :min and :max characters.",
        "array"   => "The :attribute must have between :min and :max items.",
    ],
    "boolean"              => "The :attribute field must be true or false.",
    "confirmed"            => "The :attribute confirmation does not match.",
    "date"                 => "The :attribute is not a valid date.",
    "date_format"          => "<i>[ :attribute ]</i> :  Wrong date format - صيغة التاريخ غير صحيحة",
    "different"            => "The :attribute and :other must be different.",
    "digits"               => "<i>[ :attribute ]</i> :  Must be (:digits) digits. - يجب أن يكون (:digits) أرقام.",
    "digits_between"       => "The :attribute must be between :min and :max digits.",
    "email"                => "The :attribute must be a valid email address.",
    "filled"               => "The :attribute field is required.",
    "exists"               => "The selected :attribute is invalid.",
    "image"                => "The :attribute must be an image.",
    "in"                   => "The selected :attribute is invalid.",
    "integer"              => "<i>[ :attribute ]</i> :   Must be an integer. - تجب أن يكون أرقام إنجليزية",
    "ip"                   => "The :attribute must be a valid IP address.",
    "max"                  => [
        "numeric" => "The :attribute may not be greater than :max.",
        "file"    => "The :attribute may not be greater than :max kilobytes.",
        "string"  => "The :attribute may not be greater than :max characters.",
        "array"   => "The :attribute may not have more than :max items.",
    ],
    "mimes"                => "The :attribute must be a file of type: :values.",
    "min"                  => [
        "numeric" => "The :attribute must be at least :min.",
        "file"    => "The :attribute must be at least :min kilobytes.",
        "string"  => "The :attribute must be at least :min characters.",
        "array"   => "The :attribute must have at least :min items.",
    ],
    "not_in"               => "The selected :attribute is invalid.",
    "numeric"              => "The :attribute must be a number.",
    "regex"                => "The :attribute format is invalid.",
    "required"             => "<i>[ :attribute ]</i> : required - مطلوب",
    "required_if"          => "<i>[ :attribute ]</i> : field is required when <i>[ :other ]</i>  is :value.",
    "required_with"        => "<i>[ :attribute ]</i> : field is required when <i>[ :values ]</i> is present.",
    "required_with_all"    => "The :attribute field is required when :values is present.",
    "required_without"     => "The :attribute field is required when :values is not present.",
    "required_without_all" => "The :attribute field is required when none of :values are present.",
    "same"                 => "The :attribute and :other must match.",
    "size"                 => [
        "numeric" => "The :attribute must be :size.",
        "file"    => "The :attribute must be :size kilobytes.",
        "string"  => "The :attribute must be :size characters.",
        "array"   => "The :attribute must contain :size items.",
    ],
    "unique"               => "<i>[ :attribute ]</i> :  Already taken - مضاف مسبقا.",
    "url"                  => "The :attribute format is invalid.",
    "timezone"             => "The :attribute must be a valid zone.",

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom'               => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes'           => [
        'mobile_no'    => 'Mobile No - رقم الجوال',
        'name1'        => 'First Name - الاسم',
        'name2'        => 'Second Name - الأب',
        'name3'        => 'Third Nam - e الجد',
        'name4'        => 'Family Name - العائلة',
        'fixed_at'     => 'Check at - تاريخ الفحص',
        'created_at'   => 'created at - تاريخ الاستلام',
        'is_delivered' => 'Is Delivered - هل تم التسليم',
        'delivered_at' => 'delivered at - تاريخ التسليم',
        'required'     => 'Requirements - المطلوب',
        'technical_id' => 'Technical Name - فني الصيانة',
        'recipient_id'=>'Recipient Name - الفني المستلم',
        'device_name'=>'Device Type - نوع الجهار',
    ],

];
