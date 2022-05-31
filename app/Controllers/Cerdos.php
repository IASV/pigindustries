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

        return view('elementos/header-menu').view('pig/cerdos', $data).view('elementos/footer');
    }

    public function create()
    {
        $data = $this->request->getPost();        
        if($data['raza'] != '' && $data['peso'] != ''){
            //Tabla cerdo
            $sql = "INSERT INTO animal (raza,fecha_nacimiento,estado) VALUES (?,?,?)";
            $query = $this->db->query($sql, [strtolower($data['raza']),strtolower($data['fecha-nacimiento']),strtolower($data['rol']),strtolower($data['estado'])])->get()->getResultArray();            
            //Tabla peso
            print_r('ok');
            return redirect()->to('/Rol');
        } else {
            print_r('error');
        }
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