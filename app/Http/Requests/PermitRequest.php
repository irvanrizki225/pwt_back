<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermitRequest extends FormRequest
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
        return [
            'user_id' => 'required|integer|exists:User,id',
            'product_id' => 'required|integer|exists:products,id',
            'signatur_id' => 'required|integer|exists:permits,id',
            'name'=>'required|max:255',
            'contraktor'=>'required|max:255',
            'date_application'=>'required|date_format',
            'expiry_date'=>'required|date_format',
            'status'=>'required|max:225',
        ];
    }
}
