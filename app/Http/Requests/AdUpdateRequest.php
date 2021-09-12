<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdUpdateRequest extends FormRequest
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
            'title'=>['required','min:5'],
            'condition'=>['required','min:3'],
            'location'=>['required','min:3'],
            'description'=>['required','min:5'],
            // 'profile_picture'=>['required','mimes:jpeg,png,jpg','max:2048']
        ];
    }
}
