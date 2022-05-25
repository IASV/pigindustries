<?php

namespace App\Controllers;

class Login extends BaseController
{
  public function __construct()
  {
    $this->db = \Config\Database::connect();
    $this->session = \Config\Services::session();
		$this->request = \Config\Services::request();
  }

  public function index()
  {
    if ($this->session->login) {
      
      return redirect()->to('/');
      
    }

    return view('login');
  }

  public function entrar()
  {
    $data = $this->request->getPost();

    $query = $this->db->table('usuarios')->where('usuario', $data['usuario'])->get(1)->getResultArray();

    if (count($query)>0) {
      
      if ($data['password'] == $query[0]['password']) {
        
        $this->session->set(['login' => true, 'usuario' => $query[0]['usuario']]);

        print_r('ok');
        return;

      }

    }

    print_r('error');

    // print_r(json_encode($query));

  }
}
