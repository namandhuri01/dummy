<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CollegeRequest extends FormRequest
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
        // dd(request()->all());
        $college = $this->college;
        $createRules = [
            'name'                                 => 'bail|required|string',
            'email'                                => 'bail|required|string|unique:users',
            'logo'                                 =>  'bail|required|image|mimes:jpg,jpeg,png',
            'cover_image'                          =>  'bail|required|image|mimes:jpg,jpeg,png',
            'card_image'                           =>  'bail|required|image|mimes:jpg,jpeg,png',
            'broucher'                             =>  'bail|required|image|mimes:jpg,jpeg,png',
            'college_detail.college_name'          => 'bail|required|string',
            'college_detail.college_type_id'       =>  'bail|required|integer',
            'college_detail.contact_person_name'   =>  'bail|required|string',
            'college_detail.contact_number'        =>  'bail|required|numeric',
            'college_detail.alternate_number'      =>  'bail|required|numeric',
            'college_detail.fax_number'            =>  'bail|required|numeric',
            'college_detail.email'                 =>  'bail|required|email',
            'college_detail.website'               =>  'bail|required|url',
            'college_detail.affilated_by'          =>  'bail|required|string',
            'college_detail.year_of_establishment' =>  'bail|required|digits:4|integer|min:1900|max:'.(date('Y')+1),
            'college_detail.dte_code'              =>  'bail|required|string',
            'college_detail.country_id'            =>  'bail|required|integer',
            'college_detail.state_id'              =>  'bail|required|integer',
            'college_detail.city'                  =>  'bail|required|string',
            'college_detail.about'                 =>  'bail|required|string',
            'college_detail.achivment'             =>  'bail|required|string',
            'college_detail.iso_detail'            =>  'bail|required|string',
            'college_detail.address'               =>  'bail|required|string',
            'college_detail.authorize_body'        =>  'bail|required|string',
            'college_detail.facilites'             =>  'bail|required|string',
            'added_for'                            =>  'bail|required',
        ];
        return ($this->method() == 'PUT') ? $updateRules : $createRules;
    }
}
