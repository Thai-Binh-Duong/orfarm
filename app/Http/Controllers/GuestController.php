<?php

namespace App\Http\Controllers;

use App\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\validation\Factory;

class GuestController extends Controller
{
    public function login(Request $request){
        $validator = Validator::make($request->all(),
            [
                'email' => 'required',
                'password' => 'required', 
            ]
        );

        if ($validator->fails()) {
            $data['error'] = response()->json(['errors'=>$validator->errors()]);
            return $data;
            // return response()->json(['errors'=>$validator->errors()]);
        }else{
            // return $_POST;

            $email =  $_POST['email'];
            $password = $_POST['password'];

            // return $email."-".$password ;
            // return $guests;

            // $email =  $request->input('email');
            // $password = Hash::make($request->input('password')) ;

            // $guests = Guest::all();
            // return $guests;

            $guest = Guest::where('email', $email )->first();
            // return json_encode($guest->email) ;

            if($guest){
                if( Hash::check($password,$guest->password) ){
                    return response()->json(['isLogin'=>['login' => 'Login Success!']]);
                    // return json_encode($guest->password) ;
                }else{
                    // return json_encode($guest->email) ;
                    return response()->json(['errors'=>['checkLogin' => 'Email or Password not correct!']]);
                }
            }else{
                return response()->json(['errors'=>['checkEmail' => 'Email not correct!']]);
            }

        }

        // return $request->all();
    }

    public function register(Request $request){

        // $email =  $_POST['email'];
        // $data['email'] = $email;
        // return $data;
        // print_r($_POST);
        
        $validator = Validator::make($request->all(),
            [
                'email' => 'required|email|unique:guests',
                'password' => 'required|min:8' 
            ],
            [
                'email.unique' => 'The email already exist!!',
                'password.min' => 'The password needs min 8 characters!!'
            ]
        );

        if ($validator->fails()) {
            $data['error'] = response()->json(['errors'=>$validator->errors()]);
            return $data;
            // return response()->json([
            //     // 'errors'=>$validator->errors()
            //     // 'status' => 400,
            //     'errors'=>$validator->errors()
            // ]);
        }else{
            // $guest = new Guest();
            // $email = $request->email;
            // $password = Hash::make( $request->password );

            $email =  $_POST['email'];
            $password = Hash::make($_POST['password']);
            
            Guest::create([
                'email' => $email,
                'password' => $password
            ]);
            return response()->json([
                // 'status' => 200,
                'messages' => 'Register Successfully!!'
            ]);
            // $request->session()->pull('register_success', 'Register Success!!');
        }

    }


    // public function test(){
    //     return view('mail.order');
    // }
}
