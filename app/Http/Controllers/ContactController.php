<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\ContatoMail;
use App\Http\Requests;
use App\Setting;

class ContactController extends Controller
{
    public function index() {
    	return view( 'contato' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function mail(Request $request) {

    	$from = $request->input('email');
    	$name = $request->input('name');
    	$title = $request->input('subject');
    	$msg = $request->input('message');
    	$to = Setting::where('name','email')->first()->value;
    	Mail::to([$to])->send(new ContatoMail( $msg, $title, $from ));
    }
}
