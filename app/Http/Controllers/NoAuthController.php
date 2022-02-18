<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoAuthController extends Controller
{
    public function __construct()
    {
		$this->middleware('guest');
    }
		
	public function contactSend(Request $request)
	{
		$message = '';
		$message .= 'Votre nom : ' . strtoupper(trim($request->name)) . '<br/>';
		$message .= 'Votre email : ' . strtolower(trim($request->email)) . '<br/>';
		$message .= 'L\'objet de la demande : ' . ucfirst(strtolower(trim($request->subject))) . '<br/><br/>';
		$message .= 'Votre message : ' . trim($request->message) . '<br/>';
		$message = 'Votre message a été envoyé avec succès.';
		return redirect()->route('contact')
            ->withSuccess(__($message));
	}
}
