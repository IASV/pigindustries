<?php

namespace App\Controllers;

class Productos extends BaseController
{

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
		$this->request = \Config\Services::request();
    }

    public function index()
    {
        return view('elementos/header-menu').view('producto/crear').view('elementos/footer');
    }
}