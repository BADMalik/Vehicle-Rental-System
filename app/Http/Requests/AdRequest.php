<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class AdRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
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
            'profile_picture'=>['required','mimes:jpeg,png,jpg','max:2048']
            //
        ];
    }
}
