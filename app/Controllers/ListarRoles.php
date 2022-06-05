<?php

namespace App\Controllers;

class ListarRoles extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
		$this->request = \Config\Services::request();
    }

    public function index()
    {
        $rols = $query = $this->db->table('rol')->get()->getResultArray();                
        $data = array("rols" => $rols);

        return view('elementos/header-menu').view('rol/listar', $data).view('elementos/footer');
    }
}