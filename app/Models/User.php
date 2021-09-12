<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Ad;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'user_name',
        'bio',
        'phone_no',
        'user_type',
        'email',
        'password',
        'email_verified_at',
        'id',
        'remember_token',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public static function authenticateUser($email,$password)
    {
            // dd
            return User::where('email',$email)->where('password',$password)->get();
    }
    public static function getAllAds()
    {
        return Ad::select('*')->where('status','approved')->orderBy('created_at','desc')->paginate(8);
    }
}
