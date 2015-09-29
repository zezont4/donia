<?php namespace App\Http\Requests;

class ContractRequest extends Request {

    public function rules()
    {
        $dateFormat = "Y-m-d H:i:s";

        return [
            "recipient_id"  => "sometimes|required",
            "created_at"    => "sometimes|required|date_format:{$dateFormat}",
            "device_name"   => "sometimes|required",
            "required"      => "sometimes|required",

            "fixed_at"      => "sometimes|required|date_format:{$dateFormat}|after:created_at",
            "is_repaired"   => "required_with:fixed_at",
            "why_not_fixed" => "required_if:is_repaired,0",
            "technical_id"  => "required_with:fixed_at",
            "money"         => "integer|required_if:is_repaired,1",

            "delivered_at"  => "required_if:is_delivered,1|date_format:{$dateFormat}|after:fixed_at",
        ];
    }


    public function authorize()
    {
        return true;
    }


}
