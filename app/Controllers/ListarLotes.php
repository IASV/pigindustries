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
        $lotes = $query = $this->db->table('lote')->get()->getResultArray();                
        $data = array("lotes" => $lotes);

        return view('elementos/header-menu').view('lote/listar', $data).view('elementos/footer');
    }
}