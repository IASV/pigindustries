<?php

namespace App\Controllers;

class CreateUser extends BaseController
{
    public function index()
    {
        return view('elementos/header-menu').view('account/create').view('elementos/footer');
    }
}
