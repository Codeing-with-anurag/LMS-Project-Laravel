<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable {

    use HasApiTokens,
        HasFactory,
        Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function updateProfile($request, $id) {
        $user = User::find($id);
        $user->name = $request->name;
        $user->save();
    }
    
    public static function updatePassword($request, $id) {
        $user = User::find($id);
        $user->password = Hash::make($request->newpassword);
        $user->save();
    }

     /* Student Register */
     public static function register($request)
     {                
        $data = new User();
         
         $data->name  = $request->name;
         $data->email  = $request->email;
         $data->password	  = Hash::make($request->password);   
         $data->role = config('const.studentRole');
         $data->save();
         return $data;
     }

}
