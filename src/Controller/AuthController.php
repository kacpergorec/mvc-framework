<?php


namespace App\Controller;


use App\Core\Controller;
use App\Core\Request;
use App\Model\RegisterModel;

class AuthController extends Controller
{

    public function login()
    {
//        $this->setLayout('auth');
        return $this->view('login');
    }

    public function register(Request $request)
    {
        $registerModel = new RegisterModel();

        if ($request->isPost()) {

            $registerModel->loadData($request->getBody());



            if ($registerModel->validate() && $registerModel->register()) {
                return "Success";
            }

            return $this->view('register', [
                'model' => $registerModel,
            ]);
        }

//        $this->setLayout('auth');

        return $this->view('register', [
            'model' => $registerModel,
        ]);
    }
}