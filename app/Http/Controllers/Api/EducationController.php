<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\education_qualifications;
use Validator;

class EducationController extends Controller
{
    public function Education($id=null){
        if ($id==''){
            $users=education_qualifications::get();
            return response()->json(['users'=>$users],200);
        }
        else
        $users=education_qualifications::find($id);
            return response()->json(['users'=>$users],200);

    }
    //Add education

    public function AddEducation(Request $request){
        if($request->isMethod('post')){
            $data =$request->all();

            $rules =[
                'institution'=>'required',
                'graduate_at'=>'required',
                'added_at'=>'required',
                'advisor_id'=>'required',

            ];

            $customMessage = [
                'institution.required'=> 'institution is required',
                'graduate_at.required'=> 'graduate_at is required',
                'added_at.required'=> 'added_at is required',
                'advisor_id.required'=> 'advisor_id is required',

            ];

            $validator = Validator::make($data,$rules,$customMessage);
            if($validator->fails()){
                return response()->json($validator->errors(),422);
            }

            //return $data;
            $user =new education_qualifications();
            $user->institution=$data['institution'];
            $user->graduate_at=$data['graduate_at'];
            $user->added_at=$data['added_at'];
            $user->advisor_id=$data['advisor_id'];
            $user->save();
            $message ='User successfully Added';
            return response()->json(['message'=>$message],201);
        }


    }

     // Update Education
     public function UpdateEducation(Request $request,$id){
        if($request->isMethod('put')){
            $data =$request->all();

            $rules =[
                'institution'=>'required',
                'graduate_at'=>'required',
                'added_at'=>'required',
                'advisor_id'=>'required'
            ];

            $customMessage = [
                'institution.required'=> 'institution is required',
                'graduate_at.required'=> 'graduate_at is required',
                'added_at.required'=> 'added_at is required',
                'advisor_id.required'=> 'advisor_id is required'

            ];

            $validator = Validator::make($data,$rules,$customMessage);
            if($validator->fails()){
                return response()->json($validator->errors(),422);
            }

            //return $data;
            $user =education_qualifications::findorFail($id);
            $user->institution=$data ['institution'];
            $user->graduate_at=$data ['graduate_at'];
            $user->added_at=$data ['added_at'];
            $user->advisor_id=$data ['advisor_id'];
            $user->save();
            $message ='User successfully Updated';
            return response()->json(['message'=>$message],202);
        }


    }
    //Delete Single Education
    public function DeleteEducation($id=null){
        education_qualifications::findorFail($id)->delete();
        $message=' Successfully Delete';
        return response()->json(['message'=>$message],200);

    }

}
