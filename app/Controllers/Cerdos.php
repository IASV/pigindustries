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
        $cerdo = $query = $this->db->table('animal')->get()->getResultArray();                
        $data = array("cerdo" => $cerdo);


        return view('elementos/header-menu').view('account/cerdos').view('elementos/footer');
    }

    public function crear()
    {
        $data = $this->request->getPost();

        if($data!= ''){
            $sql = "INSERT INTO raza (raza), peso (peso), fecha_nacimiento(fecha_nacimiento), estado(estado)  VALUES (?)";
            //$query = $this->db->query($sql, [strtolower($data['raza'])]);            
            print_r('ok');
            return redirect()->to('/cerdos');

        } else {
            print_r('error');
        }
    }
}