<?php

namespace App\Controllers;

class Cerdos extends BaseController
{
    
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
		$this->request = \Config\Services::request();
    }

    public function index()
    {
        //$cerdo = $query = $this->db->table('animal')->get()->getResultArray();                
        //$data = array("cerdo" => $cerdo);

        $data = $this->getData();

        return view('elementos/header-menu').view('account/cerdos', $data).view('elementos/footer');
    }

    public function create()
    {
        $data = $this->request->getPost();        

        return;
    }

    public function getData(){
        //consulta de lotes
        $lotes = $query = $this->db->table('lote')->get()->getResultArray();     
        //consulta de animales
        $cerdos = $query = $this->db->table('animal')->get()->getResultArray();                
        //data
        $data = array(
            "cerdos" => $cerdos, 
            "lotes" => $lotes
        );

        return $data;
    }
}