<?php

namespace App\Controllers;

class CreateUser extends BaseController
{
      
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
		$this->request = \Config\Services::request();
    }


    public function index()
    {
        $data = $this->getData();

        return view('elementos/header-menu').view('account/create', $data).view('elementos/footer');
    }


    public function getData(){
        //consulta de roles
        $roles = $query = $this->db->table('rol')->get()->getResultArray();     
        //consulta de animales         
        //data
        $data = array(
            "roles" => $roles
        );

        return $data;
    }
}


