<?php


namespace App\Controller;


use App\Core\Controller;
use App\Core\Request;

class AuthController extends Controller
{

    public function login()
    {
        $this->setLayout('auth');
        return $this->view('login');
    }

    public function register(Request $request)
    {
        if ($request->isPost()) {
            return 'handle data';
        }

        $this->setLayout('auth');
        return $this->view('register');
    }
}