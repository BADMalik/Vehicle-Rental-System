<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use App\Rules\UserRegisteration;
use Illuminate\Validation\Rule;
class ProfileRequest extends FormRequest
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
            'user_name'=>['required','min:5','unique:users'],
            'password'=>['required','confirmed','min:5'],
            'email' => ['required','email', Rule::unique((new User)->getTable())->ignore(auth()->id())],
            'phone_no'=>['required','min:11','required','regex:/(03)[0-9]{9}/','unique:users']
        ];
    }
}
