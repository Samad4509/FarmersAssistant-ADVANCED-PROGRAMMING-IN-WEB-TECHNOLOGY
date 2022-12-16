<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Replies;
use Validator;

class Reply extends Controller
{
    public function reply($id=null){
        if ($id==''){
            $users=Replies::get();
            return response()->json(['users'=>$users],200);
        }
        else
        $users=Replies::find($id);
            return response()->json(['users'=>$users],200);

    }

     //Add Reply

     public function Addreply(Request $request){
        if($request->isMethod('post')){
            $data =$request->all();

            $rules =[
                'tittle' => 'required',
                'body' => 'required',
                'mails_id' => 'required',
                'advisor_id' => 'required',
                'created_at' => 'required',


            ];

            $customMessage = [
                'tittle'=> 'tittle is required',
                'body'=> 'body is required',
                'mails_id'=> 'mails_id is required',
                'advisor_id.required'=> 'advisor_id is required',
                'created_at.required'=> 'created_at is required',

            ];

            $validator = Validator::make($data,$rules,$customMessage);
            if($validator->fails()){
                return response()->json($validator->errors(),422);
            }

            //return $data;
            $user =new Replies();

            $user->tittle=$data['tittle'];
            $user->body=$data['body'];
            $user->mails_id=$data['mails_id'];
            $user->advisor_id=$data['advisor_id'];
            $user->created_at=$data['created_at'];
            $user->save();
            $message ='User successfully Added';
            return response()->json(['message'=>$message],201);
        }


    }



}
