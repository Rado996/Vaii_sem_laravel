<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentAddRequest extends FormRequest
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
//            'commentBody.required' => 'Nenapísali ste žiadnu recenziu.',
//            'commentBody.max' => 'Maximálny počet znakov je 500.',
//            'createdBy.required' => 'Musíte byť prihlásený.'
//        ];
//    }

    public function rules()
    {
        return [
            'commentBody' => 'required|max:500',
            'createdBy' => 'required'
        ];
    }
}
