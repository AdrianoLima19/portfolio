<?php

namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller
{
    public function index(): void
    {
        $this->view('home', ['projects' => projects(), 'logo' => file_get_contents(basePath('public/assets/images/logo.svg'))]);
    }
}
