<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use Ichtrojan\Otp\Otp;
use Illuminate\Support\Facades\Hash;
class ResetPasswordController extends Controller
{
    private $otp;
    public function __construct(){
        $this->otp= new Otp();
    }
    public  function PasswordReset(ResetPasswordRequest $requset){
        $otp2=$this->otp->validate($requset->email,$requset->otp);
        if(! $otp2->status){
            return response()->json(['error'=> $otp2],401);
        }
        $user=User::where('email',$requset->email)->first();
        $user->update(['password'=> Hash::make($requset->password)]);
        $user->tokens()->delete();
        return response()->json(['success'=>true],200);

    }

}
