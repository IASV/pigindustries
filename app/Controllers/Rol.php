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
        return view('elementos/header-menu').view('account/rol').view('elementos/footer');
    }

    public function add()
    {
        $data = $this->request->getPost();
        print_r($data['rol']);

        if($data['rol'] != ''){
            $sql = "INSERT INTO rol (rol) VALUES (?)";
            $query = $this->db->query($sql, [$data['rol']]);
            print_r('ok');
            return;
        } else {
            print_r('error');
        }

        return;
    }

}