<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubAdminRequest extends FormRequest
{
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
        // dd($this->file('image'));
        $subadmin = $this->aubadmin;
        $createRules = [
            'name'       => 'bail|required|string',
            'email'      => 'bail|required|string|unique:users',
            'role_id'    => 'bail|required|integer',
        ];
        $updateRules = [
            'name'       => 'bail|required|string',
            'email'      => 'bail|required|string|unique:users,email',
            'role_id'    => 'bail|required|integer',
        ];
        return ($this->method() == 'PUT') ? $updateRules : $createRules;
    }
    public function messages()
    {
        return [
            'name.required'=> 'The Name filed is required',
        ];
    }
}
