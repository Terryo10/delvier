<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:3',
                'email' => 'required|email',
                'password' => 'required|alpha_num|min:5',
                'confirm_password' => 'required|same:password',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['Validation errors' => $validator->errors()]);
        }

        $input = array(
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        );

        // check if email already registered
        $user = User::where('email', $request->email)->first();
        if (!is_null($user)) {
            $data['message'] = "Sorry! this email is already registered";
            return response()->json(['success' => false, 'status' => 'failed', 'data' => $data]);
        }

        // create and return data
        $user = User::create($input);
        $success['message'] = "You have registered successfully";

        return response()->json(['success' => true, 'user' => $user]);


    }
}
