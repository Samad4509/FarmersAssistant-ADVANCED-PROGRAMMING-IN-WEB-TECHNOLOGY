<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\TestMail;
class SendEmailController extends Controller
{
    public function index()
    {
      Mail::to('exampole@gmail.com')->send(new TestMail());
      return "ok";

    //   if (Mail::failures()) {
    //        return response()->Fail('Sorry! Please try again latter');
    //   }else{
    //        return response()->success('Great! Successfully send in your mail');
    //      }
    }
}
