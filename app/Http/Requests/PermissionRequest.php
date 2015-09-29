<?php namespace App\Http\Requests;

class PermissionRequest extends Request {

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
        $slug = @$this->permission_id->id or '';

        return [
            'permission_title' => 'required',
            'permission_slug'  => ['required', 'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/', 'unique:permissions,permission_slug,' . $slug]
        ];
    }

}
