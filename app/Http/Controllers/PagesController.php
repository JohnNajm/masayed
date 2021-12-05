<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function thankyou(){
        return view('pages.thankyou');
    }
    public function contact(){
        return view('pages.contact');
    }
    public function faq(){
        return view('pages.faq');
    }
    public function tac(){
        return view('pages.tac');
    }
    public function legal(){
        return view('pages.tac');
    }
}

