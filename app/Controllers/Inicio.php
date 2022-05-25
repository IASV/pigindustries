<?php

namespace App\Controllers;

class Inicio extends BaseController
{
  public function __construct()
  {
    $this->db = \Config\Database::connect();
    $this->session = \Config\Services::session();
		$this->request = \Config\Services::request();
  }

  public function index()
  {
    return view('elementos/header-menu').view('inicio').view('elementos/footer');
  }

  public function salir()
  {
    $this->session->destroy();
    return redirect()->to('/login');
  }
}
