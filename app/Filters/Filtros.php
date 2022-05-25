<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Filtros implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
    	$this->session = \Config\Services::session();

      if (!$this->session->login) {
		
				return redirect()->to('/login');
			}
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}