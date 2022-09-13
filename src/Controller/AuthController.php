<?php


namespace App\Controller;


use App\Core\Application;
use App\Core\Controller;
use App\Core\Request;
use App\Model\User;

class AuthController extends Controller
{

    public function login()
    {
        return $this->view('login');
    }

    public function register(Request $request)
    {
        $user = new User();

        if ($request->isPost()) {

            $user->loadData($request->getBody());

            if ($user->validate() && $user->save()) {
                Application::$app->session->setFlash('success','Thanks for registering!');
                Application::$app->response->redirect('/');
            }

        }

        return $this->view('register', [
            'model' => $user,
        ]);
    }
}