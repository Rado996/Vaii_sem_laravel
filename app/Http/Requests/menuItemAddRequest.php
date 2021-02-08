<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class menuItemAddRequest extends FormRequest
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

    public function messages()
    {
        return [
            'itemName.required' => 'Pole názov musí byť vyplnené.',
            'itemDesc.required' => 'Pole popis musí byť vyplnené.',
            'itemIng.required' => 'Pole ingrediencie musí byť vyplnené.',
            'itemPrice.required' => 'Pole cena musí byť vyplnené.',
            'itemName.max' => 'Názov nesmie byť dlhší ako 30 znakov.',
            'itemDesc.max' => 'Popis nesmie byť dlhší ako 100 znakov.',
            'itemIng.max' => 'Zloženie nesmie byť dlhšie ako 200 znakov.',
            'itemPrice' => 'Cena musí byť vyplnená',
        ];
    }

    public function rules()
    {
        return [
            'itemName' => 'required|max:30',
            'itemDesc' => 'required|max:100',
            'itemIng' => 'required|max:200',
            'itemPrice' => 'required',
        ];
    }
}
