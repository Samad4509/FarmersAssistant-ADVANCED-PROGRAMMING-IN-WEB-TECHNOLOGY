<?php

namespace App\Http\Controllers\Advisor;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Users\Advisors;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\updateShows;

class AdvisorRegContoller extends Controller
{
    public function index()
    {
        return view('auth.Advisors.register');
    }

    public function Register(Request $request)
    {


        $request->validate([

            'fname' => 'required',
            'lname' => 'required',
            'username' => 'required',
            'postalcode' => 'required',
            'email' => 'required|email|unique:users',
            'phone'=> 'required',
            'city'=> 'required',
            'dob'=> 'required',
            'gender'=> 'required',
            'address'=> 'required',
            'password' => 'required|Min:5|Max:12'


        ]);

        {

            $advisor = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'address' => $request->address,
                'gender' => $request->gender,
                'phone' => $request->phone,
                'postalCode' => $request->postalcode,
                'city' => $request->city,
                'dob' => $request->dob,
                'firstName'=>$request->fname,
                'lastName'=>$request->lname,
                'password' => Hash::make($request->password),


            ]);

            Advisors::create([
                'user_id' => $advisor->id,
            ]);

            $advisor = User::find($advisor->id);
            // Log the farmer in
            Auth::login($advisor);
            session(['user_type' => Auth::user()->getUserType()]);
            session(['user_id' => User::find(Auth::id())->advisor->first()->id]);
            // Redirect to the farmer dashboard
            //get all farmers info
            return back();
        }


    }

    public function Myprofile()
    {

        $data=User::all();
        return view('advisorshowprofile',['User'=>$data]);


    }
    public function Showprofile($id)
    {
        $data=User::find($id);
        return view('AdvisorUpdateProfile',['data'=>$data]);
        return redirect('/edit3');
    }

    public function ProfileUpdate(Request $req)
    {
        // return $req->input();
        $data=User::find($req->id);
        $data->firstname = $req->firstname;
        $data->lastname= $req->lastname;
        $data->username = $req->username;
        $data->email = $req->email;
        $data->dob = $req->dob;
        $data->gender= $req->gender;
        $data->city = $req->city;
        $data->postalCode= $req->postalcode;
        $data->address = $req->address;
        $data->phone= $req->phone;
        $data->created_at = $req->created_at;
        $data->save();
        return redirect('/list3');

    }


}
