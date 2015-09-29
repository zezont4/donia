<?php namespace App\Http\Requests;

class ClientRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $client_id = @$this->client_id_wt->id or '';

        return [
            'name1'     => 'required',
            'mobile_no' => 'required|digits:10|unique:clients,mobile_no,' . $client_id
        ];
    }

}
