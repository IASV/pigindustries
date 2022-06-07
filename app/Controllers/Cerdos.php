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
        $lotes = $query = $this->db->table('lote')->get()->getResultArray();     
        $data = array("lotes" => $lotes);

        return view('elementos/header-menu').view('pig/crear', $data).view('elementos/footer');
    }

    public function create()
    {
        $data = $this->request->getPost();                        
     
        if($data['raza'] != '' && $data['peso'] != '' && $data['fecha-nacimiento'] != ''){
            //Animal
            $animal = [
                'raza' => strtolower($data['raza']),
                'fecha_nacimiento' => $data['fecha-nacimiento'],
                'estado' => strtolower($data['estado']),
                'peso' => $data['peso'],
            ];            
            $builderA = $this->db->table('animal');
            $builderA->insert($animal);                      
            $id = $this->db->insertID();

            //HistorialPeso
            $peso = [
                'peso' => $data['peso'],
                'fecha' => date("Y-m-d"),
                'id_animal' => $id,
            ];
            $builderP = $this->db->table('historial_peso');
            $builderP->insert($peso);

            //$builderL = $this->db->table('lote');
            //$lote = $builderL->where('nombre',$data['lote'])->get()->getResultArray();
            //$lote = $this->db->table('lote')->where('nombre',$data['lote'])->get(1)->getResultArray();
            //$sql = "SELECT * FROM lote WHERE nombre = ?";
            //$idLote = $this->db->query($sql, [strtolower($data['lote'])])->get(1)->getResultArray();            
            //print_r(json_encode($lote));

            //LoteAnimal
            $loteAnimal = [
                'id_lote' => $data['lote'],
                'id_animal' => $id,
            ];
            $builderLA = $this->db->table('lote_animal');
            $builderLA->insert($loteAnimal);

            //Enfermo
            if($data['enfermedad'] != ''){
                $enfermo = [
                    'nombre' => strtolower($data['enfermedad']),
                    'id_animal' => $id,
                ];
                $builderE = $this->db->table('enfermo');
                $builderE->insert($enfermo);
            } 
            //Sacrificio
            else if($data['fecha-sacrificio'] != ''){
                $sacrificio = [
                    'fecha' => $data['fecha-sacrificio'],
                    'id_animal' => $id,
                ];
                $builderS = $this->db->table('sacrificio');
                $builderS->insert($sacrificio);
            }
            //Muerto
            else if($data['causa-muerte'] != ''){
                $muerto = [
                    'causa' => strtolower($data['fecha-sacrificio']),
                    'id_animal' => $id,
                ];
                $builderM = $this->db->table('muerto');
                $builderM->insert($muerto);
            }   
            
            //AnimalComprado
            if($data['precio'] != 0){
                $animalComprado = [
                    'precio' => $data['precio'],
                    'id_animal' => $id,
                ];
                $builderAC = $this->db->table('animal_comprado');
                $builderAC->insert($animalComprado);
            }

            print_r('ok');
            return;
        } else {
            print_r('error');
        }
    }

    

    public function delete($id)
    {
        //Tabla historialPeso
        $sql = "DELETE FROM historial_peso WHERE id_animal = ?";
        $query = $this->db->query($sql, [$id]);     
        //Tabla loteAnimal
        $sql = "DELETE FROM lote_animal WHERE id_animal = ?";
        $query = $this->db->query($sql, [$id]);  
        //Tabla animal
        $sql = "DELETE FROM animal WHERE  id = ?";
        $query = $this->db->query($sql, [$id]);           

        print_r('ok');
        return redirect()->to('/Cerdos');
    }

    public function edit($id)
    {
        $sql = "SELECT a.id, a.raza, a.fecha_nacimiento, a.estado, a.peso, l.nombre as lote  FROM animal AS a, lote_animal AS la, lote AS l WHERE  a.id = la.id_animal AND la.id_lote = l.id AND a.id = ?";
        $animal = $this->db->query($sql, [$id])->getResultArray();

        $lotes = $query = $this->db->table('lote')->get()->getResultArray();    

        $data = array(
            "lotes" => $lotes,
            "animal" => $animal[0]
        );

        return view('elementos/header-menu').view('pig/editar', $data).view('elementos/footer');
    }

    public function update()
    {
        return;
    }

    public function view($id)
    {
        #Información del animal
        $sql = "SELECT a.id, a.raza, a.fecha_nacimiento, a.estado, a.peso, l.nombre as lote  FROM animal AS a, lote_animal AS la, lote AS l WHERE  a.id = la.id_animal AND la.id_lote = l.id AND a.id = ?";
        $animal = $this->db->query($sql, [$id])->getResultArray();

        //Historial del peso
        $sql = "SELECT id, peso, fecha FROM historial_peso WHERE id_animal = ?";
        $historialPeso = $this->db->query($sql, [$id])->getResultArray();

        //Información de salud
        
        //Enfermedad
        $enfermedad = $this->db->table('enfermo')->where('id_animal', [$id])->get(1)->getResultArray();
        if (count($enfermedad) > 0) $enfermedad = array("nombre"=>$enfermedad[0]['nombre']);
        else $enfermedad = array("nombre"=>'ninguna');


        //Fecha de sacrificio
        $sacrificio = $this->db->table('sacrificio')->where('id_animal', [$id])->get(1)->getResultArray();
        if (count($sacrificio) > 0) $sacrificio = array("fecha"=>$sacrificio[0]['fecha']);
        else $sacrificio = array("fecha"=>'ninguna');

        //Causa de muerte
        $muerte = $this->db->table('muerto')->where('id_animal', [$id])->get(1)->getResultArray();
        if (count($muerte) > 0) $muerte = array("causa"=>$muerte[0]['causa']);
        else $muerte = array("causa"=>'ninguna');

        //Información de adquisición
        //Forma de adquisición
        $forma = array("forma"=>'ninguna');
        $precio = $this->db->table('animal_comprado')->where('id_animal', [$id])->get(1)->getResultArray();
        if (count($precio) > 0) {
            $forma = array("forma"=>'comprado');
            $precio = array("adquirido"=>'$'.$precio[0]['precio']);
        }        
        else {
            $forma = array("forma"=>'Producido');
            $precio = array("adquirido"=>'');
        }

        $data = array(
            "animal" => $animal[0],
            "historialPeso" => $historialPeso,
            "enfermedad" => $enfermedad,
            "sacrificio" => $sacrificio,
            "muerte" => $muerte,
            "forma" => $forma,
            "precio" => $precio
        );

        return view('elementos/header-menu').view('pig/ver', $data).view('elementos/footer');
    }
    
}