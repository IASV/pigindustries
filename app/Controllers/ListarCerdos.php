<?php

namespace App\Controllers;

class ListarCerdos extends BaseController
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

        return view('elementos/header-menu').view('pig/listar', $data).view('elementos/footer');
    }

    public function getData()
    {
        $sql = "SELECT a.id, a.raza, a.fecha_nacimiento, a.estado, a.peso, l.nombre as lote  FROM animal AS a, lote_animal AS la, lote AS l WHERE  a.id = la.id_animal AND la.id_lote = l.id";
        $animales = $this->db->query($sql)->getResultArray();   

        return array( "animales" => $animales );
    }

}