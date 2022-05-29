<?php

namespace App\Controllers;

class Rol extends BaseController
{

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->request = \Config\Services::request();
    }

    public function index()
    {
        $rols = $query = $this->db->table('rol')->get()->getResultArray();                
        $data = array("rols" => $rols);

        return view('elementos/header-menu').view('account/rol', $data).view('elementos/footer');
    }

    public function add()
    {
        $data = $this->request->getPost();        

        if($data['rol'] != ''){
            $sql = "INSERT INTO rol (rol) VALUES (?)";
            $query = $this->db->query($sql, [strtolower($data['rol'])]);            
            print_r('ok');
            return redirect()->to('/Rol');
        } else {
            print_r('error');
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM rol WHERE  id_rol = ?";
        $query = $this->db->query($sql, [$id]);            
        print_r('ok');
        return redirect()->to('/Rol');
    }

}