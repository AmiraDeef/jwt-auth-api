<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;



use App\Http\Traits\apiHandeller;
use Tymon\JWTAuth\Facades\JWTAuth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    use apiHandeller;

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        if(!$token=JWTAuth::attempt($credentials)){
            return $this->errorMessage('error');
        }else{
            return $this->data('token' ,$token,'successfully logged in');
        }


        // Use the trait method
        //return $this->successMessage($token);
    }
    public function getById(Request $request){
        $id=$request->input('id');
        $user=User::find($id);
        if (!$user) {
            return $this->errorMessage('User not found');
        }

        return $this->data('user', $user, '');
    }
}
