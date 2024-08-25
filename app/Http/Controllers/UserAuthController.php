<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    function signup(Request $request){
        $input = $request->all();
        $input["password"]= bcrypt($input["password"]);
        $user = User::create($input);
        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $user['name'] = $user->name;
        return ['success'=>true,"result"=>$success];
    }
    function login(Request $request){

        $user = User::where('email',$request->email)->first();
            if(!$user || !Hash::check($request->password ,$user->password)){
                return ['result'=>'User not found',"success"=>false];
            }

            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $user['name'] = $user->name;


        return $user;
        
    }

    function getAll(){
        return User::all();
    }
}