<?php

namespace App\Controllers;

use App\Models\AuthModel;

class Auth extends BaseController
{

    protected $AuthModel;

    public function __construct()
    {
        $this->AuthModel = new AuthModel();
    }


    public function login()
    {
        $data = [
            'title' => "Login - Dashboard Admin",
        ];
        return view('auth/login', $data);
    }


    public function Ceklogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $data = $this->AuthModel->cek_login($username, $password);

        if ($data) {
            session()->set('login', true);
            session()->set('username', $data['username']);
            session()->set('level', $data['level']);
            return redirect()->to('/dashboard');
        } else {
            session()->setFlashdata('error', 'Username / Password Salah');
            return redirect()->to('/');
        };
    }


    public function logout()
    {
        session()->remove('login');
        session()->remove('username');
        session()->remove('level');
        return redirect()->to('/');
    }
}
