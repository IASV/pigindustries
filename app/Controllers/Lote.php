<?php

namespace App\Controllers;

class Lote extends BaseController
{

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->request = \Config\Services::request();
    }

    public function index()
    {
        //$lotes = $query = $this->db->table('lote')->get()->getResultArray();                
        //$data = array("lotes" => $lotes);

        $data = $this->getData();

        return view('elementos/header-menu').view('lote/crear', $data).view('elementos/footer');
    }

    public function add()
    {
        $data = $this->request->getPost();        

        if($data['nombre'] != ''){
            $sql = "INSERT INTO lote (nombre) VALUES (?)";
            $query = $this->db->query($sql, [strtolower($data['nombre'])])->get()->getResultArray();            
            print_r('ok');
            return redirect()->to('/Lote');
        } else {
            print_r('error');
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM lote WHERE  id = ?";
        $query = $this->db->query($sql, [$id]);            
        print_r('ok');
        return redirect()->to('/Lote');
    }

    public function getData(){
        $lotes = $query = $this->db->table('lote')->get()->getResultArray();                
        $data = array("lotes" => $lotes);
        return $data;
    }

}