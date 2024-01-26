<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ForgetPasswordRequset;
use App\Notifications\ResetPasswordVerificationNotification;
use App\Models\User;


class ForgetPasswordController extends Controller
{
    public function forgetPassword(ForgetPasswordRequset $request){
        $input=$request->only('email');
        $user=User::where('email',$input)->first();
        $user->notify(new ResetPasswordVerificationNotification());
         return response()->json(['message'=>"email sent"],200);

    }
}
