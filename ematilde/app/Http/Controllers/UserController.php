<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;

class UserController extends Controller
{
   public function getUserById($user_id){
        return User::find($user_id);
   }

   public function modifyuser(Request $request){
    
      $input = $request->all();
      $validator = $this->validator($input);
      if($validator->passes()) {
         $user = User::find($input['id']);
         return $user;
      }else{
        return response()->json($validator->messages());
      }
   }

   public function validator(array $data)
    {
        return Validator::make($data, [
            'nombre_usuario' => 'required|string|max:255',
            'apellido_usuario' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            'email' => 'required|string|email|max:255|unique:users',
            'empresa_usuario' => 'required',
            'telefono_usuario' => 'required',
        ]);
        
    }
}
