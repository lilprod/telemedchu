<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Newsletter;

class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        if (!Newsletter::isSubscribed($request->email) ) 
        {
            Newsletter::subscribePending($request->email);
            return redirect()->back()->with('success', 'Merci pour votre souscription');
        }
        return redirect()->back()->with('error', 'Désolé! vous vous êtes déjà souscrit!');
             
    }
}
