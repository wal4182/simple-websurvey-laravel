<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PalindromeController extends Controller
{
    //
    public function index()
    {
        return view('palindrome-checker');
    }
}
