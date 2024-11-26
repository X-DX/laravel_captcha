<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyFormController extends Controller
{
    public function showForm()
    {
        return view('form');
    }
    public function submitForm(Request $request)
    {
        $request->validate([
            'captcha' => 'required|captcha',
        ]);
        return back()->with('success', 'Form submitted successfully!');
    }

    public function refreshCaptcha()
    {
        $captcha = captcha_src(); 
        return response()->json(['captcha_src' => $captcha]); 
    }
}
