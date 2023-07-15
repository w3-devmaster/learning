<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        return view('pages.index');
    }

    public function contact() {
        return view('pages.contact');
    }

    public function feature() {
        $data = [
            'name' => 'Apichat Kumjensi',
            'email' => 'apichat_pep@hotmail.com',
            'age' => '33',
            'gender' => 'Man'
        ];

        return view('pages.feature',compact('data'));

    }

    public function not_login() {
        return view('pages.not-login');
    }
}
