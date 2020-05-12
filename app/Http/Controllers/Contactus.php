<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Contactus extends Controller
{
    public function send(Request $request){
        if($request->isMethod('post')){
            $to_email = 'mutaz@live.it';
            $subject = $request['msg_subject'];
            $message = $request['msg_text'];
            $headers = 'From: '.$request['msg_email'];
            mail($to_email,$subject,$message,$headers);
            return redirect()->back()->with('Dexter',' ');

        }else{
            return view('main.contact');
        }
    }
}
