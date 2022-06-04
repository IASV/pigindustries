<?php

namespace App\Controllers;

class ListarLotes extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
		$this->request = \Config\Services::request();
    }

    public function index()
    {

        return view('elementos/header-menu').view('lote/listar').view('elementos/footer');
    }
}