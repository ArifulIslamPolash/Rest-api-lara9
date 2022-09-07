<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Validator;
// use Illuminations\Validation\validator;
// use Illuminate\Contracts\Validation\Validator;

class UserApiController extends Controller
{
    //
    public function showUser($id=null){
        if($id==''){
            $users = User::get();
            return response()->json(['users'=>$users],200);
         }else{
            $users = User::find($id);
            return response()->json(['users'=>$users],200);
         }

    }

    public function addUser(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // return $data;

            //validation data
            $rules =[
                'name'    =>'required',
                'email'   =>'required|email|unique:users',
                'password'=>'required',
            ];
            $customMessage =[
                'name.required'    =>'Name is required',
                'email.required'   =>'Email is required',
                // 'email.email'      =>'Email must be valid email',
                'password.required'=>'password is required',
            ];
            $validator = Validator::make($data, $rules, $customMessage );
            if($validator->fails()){
                return response()->json($validator->$errors(),422);
            }

            $user= new User();
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = bcrypt($data['password']);
            $user->save();

            $message= 'User created successfully';
            return response()->json(['message'=>$message],201);
        }
    }
}
