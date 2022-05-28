<?php

namespace App\Controllers;

class Home extends BaseController
{
    
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
		$this->request = \Config\Services::request();
    }
    

    public function index()
    {
        //return view('welcome_message');
        print_r("Añadir cerdos");
    }
}