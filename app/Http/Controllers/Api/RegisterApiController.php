<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class RegisterApiController extends Controller
{
    public function Register($id = null)
    {
        if ($id == '') {
            $users = User::get();
            return response()->json(['users' => $users], 200);
        } else
            $users = User::find($id);
        return response()->json(['users' => $users], 200);
    }
    //add register
    public function AddRegister(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'firstname' => 'required',
                'lastname' => 'required',
                'username' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
                'gender' => 'required',
                'city' => 'required',
                'postalCode' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'dob' => 'required',
            ];

            $customMessage = [
                'firstname.required' => 'firstname is required',
                'lastname.required' => 'lastname is required',
                'username.required' => 'username is required',
                'email.required' => 'email is must be valid email',
                'password.required' => 'password is required',
                'gender.required' => 'gender is required',
                'city.required' => 'city is required',
                'postalCode.required' => 'postalCode is required',
                'address.required' => 'address is required',
                'phone.required' => 'phone is required',

            ];

            $validator = Validator::make($data, $rules, $customMessage);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            //return $data;
            $user = new User();
            $user->firstname = $data['firstname'];
            $user->lastname = $data['lastname'];
            $user->username = $data['username'];
            $user->email = $data['email'];
            $user->password = $data['password'];
            $user->gender = $data['gender'];
            $user->city = $data['city'];
            $user->postalCode = $data['postalCode'];
            $user->address = $data['address'];
            $user->phone = $data['phone'];
            $user->dob = $data['dob'];
            $user->save();
            $message = 'User successfully Added';
            return response()->json(['message' => $message], 201);
        }
    }
    // Update User
    public function UpdateRegister(Request $request, $id)
    {
        if ($request->isMethod('put')) {
            $data = $request->all();

            $rules = [
                'firstname' => 'required',
                'lastname' => 'required',
                'username' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
                'gender' => 'required',
                'city' => 'required',
                'postalCode' => 'required',
                'address' => 'required',
                'phone' => 'required',
            ];

            $customMessage = [
                'firstname.required' => 'firstname is required',
                'lastname.required' => 'lastname is required',
                'username.required' => 'username is required',
                'email.required' => 'email is must be valid email',
                'password.required' => 'password is required',
                'gender.required' => 'gender is required',
                'city.required' => 'city is required',
                'postalCode.required' => 'postalCode is required',
                'address.required' => 'address is required',
                'phone.required' => 'phone is required',

            ];

            $validator = Validator::make($data, $rules, $customMessage);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            //return $data;
            $user = User::findorFail($id);
            $user->firstname = $data['firstname'];
            $user->lastname = $data['lastname'];
            $user->username = $data['username'];
            $user->email = $data['email'];
            $user->password = $data['password'];
            $user->gender = $data['gender'];
            $user->city = $data['city'];
            $user->postalCode = $data['postalCode'];
            $user->address = $data['address'];
            $user->phone = $data['phone'];
            $user->save();
            $message = 'User successfully Updated';
            return response()->json(['message' => $message], 202);
        }
    }
    //Delete Single User
    public function DeleteUser($id = null)
    {
        User::findorFail($id)->delete();
        $message = 'User Successfully Delete';
        return response()->json(['message' => $message], 200);
    }
}
