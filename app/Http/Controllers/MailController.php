<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\{
    MailTest, WelcomeUser
};
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function mailTest(){
        Mail::to('kunbata93@gmail.com')->send(new MailTest());
        return 'done';
    }

    public function welcomeRegisteredUser(Request $request = null, $email){
        Mail::to($email)->send(new WelcomeUser());
    }
}
