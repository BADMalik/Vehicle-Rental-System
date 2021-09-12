<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;
// use App\Http\Requests\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileEditRequest extends FormRequest
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
    public function rules(Request $request)
    {

        // dd(Auth::user()->user_name);
        return [
                'user_name'=>['min:5','unique:users',! Rule::unique((new User)->getTable())->ignore(Auth::user()->user_name)],
                'password'=>['min:5'],
                'email' => ['email', Rule::unique((new User)->getTable())->ignore(auth()->id())],
                'phone_no'=>['min:11','regex:/(03)[0-9]{9}/',! Rule::unique((new User))->ignore(Auth::user()->phone_no)]
            //
        ];
    }
}
