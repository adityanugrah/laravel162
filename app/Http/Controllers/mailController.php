<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class mailController extends Controller
{
    public function send() {
    	Mail::send(['text'=>'mail'],['name', 'Sarthak'], function($message) {
    		$message->to('burgerkillselalu@gmail.com', 'To Bitfumes') -> subject('Tes Email');
    		$message->from('burgerkillselalu@gmail.com', 'Bitfumes');
    		});
    	}
    }

