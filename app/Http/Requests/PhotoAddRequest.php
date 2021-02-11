<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhotoAddRequest extends FormRequest
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
//    public function messages()
//    {
//        return [
//            'pictureHead.required' => 'Pole názov musí byť vyplnené.',
//            'pictureDesc.required' => 'Pole popis musí byť vyplnené.',
//            'pictureName.required' => 'Musíte vložiť obrázok',
//            'pictureHead.max' => 'Názov nesmie byť dlhší ako 30 znakov.',
//            'pictureDesc.max' => 'Popis nesmie byť dlhší ako 300 znakov.',
//            'pictureName.max' => 'Veľkosť obrázka musí byť maximálne .',
//
//        ];
//    }

    public function rules()
    {
        return [
            'pictureHead' => 'required|min:3|max:30|regex:/^[^\s].+[^\s]$/',
            'pictureDesc' => 'required|min:3|max:300|regex:/^[^\s].+[^\s]$/',
            'pictureName' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ];
    }
}
