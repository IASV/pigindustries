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
        $data = $this->add();

        return view('elementos/header-menu').view('account/crear', $data).view('elementos/footer');
    }


    public function add(){
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


