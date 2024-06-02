<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        if (session()->get('login') != true) {
            return redirect()->to('/');
        }

        $data = [
            'title' => "Dashboard Admin",
        ];

        return view('pages/dashboard', $data);
    }
}
