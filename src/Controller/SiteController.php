<?php


namespace App\Controller;

use App\Core\Application;
use App\Core\Controller;
use App\Core\Request;

class SiteController extends Controller
{
    public function home()
    {
        $params = [
            'name' => 'Kacper',
        ];

        return $this->view('home', $params);
    }
}

