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
        try {
             //Tabla enfermo
            $builder = $this->db->table('enfermo');
            $query = $this->db->table('enfermo')->where('id_animal', [$id])->get(1)->getResultArray();
            if (count($query) > 0) $builder->delete(['id_animal' => $id]);

            //Tabla sacrificio
            $builder = $this->db->table('sacrificio');
            $query = $this->db->table('sacrificio')->where('id_animal', [$id])->get(1)->getResultArray();
            if (count($query) > 0) $builder->delete(['id_animal' => $id]);

            //Tabla muerto
            $builder = $this->db->table('muerto');
            $query = $this->db->table('muerto')->where('id_animal', [$id])->get(1)->getResultArray();
            if (count($query) > 0) $builder->delete(['id_animal' => $id]);       

            //Tabla animal comprado
            $builder = $this->db->table('animal_comprado');
            $query = $this->db->table('animal_comprado')->where('id_animal', [$id])->get(1)->getResultArray();
            if (count($query) > 0) $builder->delete(['id_animal' => $id]);
            
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
            return;
        } catch (Throwable $th) {
            print_r('error');
            return;
        }
       
    }

    public function edit($id)
    {
        $sql = "SELECT a.id, a.raza, a.fecha_nacimiento, a.estado, a.peso, l.nombre as lote  FROM animal AS a, lote_animal AS la, lote AS l WHERE  a.id = la.id_animal AND la.id_lote = l.id AND a.id = ?";
        $animal = $this->db->query($sql, [$id])->getResultArray();

        $lotes = $query = $this->db->table('lote')->get()->getResultArray();    

        //Enfermedad
        $enfermedad = $this->db->table('enfermo')->where('id_animal', [$id])->get(1)->getResultArray();
        if (count($enfermedad) > 0) $enfermedad = array("nombre"=>$enfermedad[0]['nombre']);
        else $enfermedad = array("nombre"=>'');

        //Fecha de sacrificio
        $sacrificio = $this->db->table('sacrificio')->where('id_animal', [$id])->get(1)->getResultArray();
        if (count($sacrificio) > 0) $sacrificio = array("fecha"=>$sacrificio[0]['fecha']);
        else $sacrificio = array("fecha"=>'');

        //Causa de muerte
        $muerte = $this->db->table('muerto')->where('id_animal', [$id])->get(1)->getResultArray();
        if (count($muerte) > 0) $muerte = array("causa"=>$muerte[0]['causa']);
        else $muerte = array("causa"=>'');

        //Información de adquisición
        //Forma de adquisición
        $precio = $this->db->table('animal_comprado')->where('id_animal', [$id])->get(1)->getResultArray();
        if (count($precio) > 0) {
            $precio = array("adquirido"=>$precio[0]['precio']);
        }        
        else {
            $precio = array("adquirido"=>'0');
        }

        $data = array(
            "lotes" => $lotes,
            "animal" => $animal[0],
            "enfermedad" => $enfermedad,
            "sacrificio" => $sacrificio,
            "muerte" => $muerte,
            "precio" => $precio
        );

        return view('elementos/header-menu').view('pig/editar', $data).view('elementos/footer');
    }

    public function update()
    {
        $data = $this->request->getPost();         
        //print_r(json_encode($data));
        $id = $data['id'];
        
        if($data['raza'] != '' && $data['peso'] != '' && $data['fecha-nacimiento'] != ''){
            //Animal
            $animal = [
                'raza' => strtolower($data['raza']),
                'fecha_nacimiento' => $data['fecha-nacimiento'],
                'estado' => strtolower($data['estado']),
                'peso' => $data['peso'],
            ];            
            $builderA = $this->db->table('animal');
            $builderA->update($animal, ['id' => $id]);                      

            //HistorialPeso
            $peso = [
                'peso' => $data['peso'],
                'fecha' => date("Y-m-d"),
                'id_animal' => $id,
            ];
            $builderP = $this->db->table('historial_peso');
            $builderP->insert($peso);

            //LoteAnimal
            $loteAnimal = [ 'id_lote' => $data['lote'], ];
            $builderLA = $this->db->table('lote_animal');
            $builderLA->update($loteAnimal, ['id_animal' => $id]);

            //Enfermo
            $builderE = $this->db->table('enfermo');
            if($data['enfermedad'] != ''){                
                $query = $this->db->table('enfermo')->where('id_animal', [$id])->get(1)->getResultArray();
                if (count($query) > 0) {
                    $enfermo = [ 'nombre' => strtolower($data['enfermedad']), ];
                    $builderE->update($enfermo, ['id_animal' => $id]);
                }                 
                else {
                    $enfermo = [ 'nombre' => strtolower($data['enfermedad']), 'id_animal' => $id, ];
                    $builderE->insert($enfermo);
                }
            } else {
                $query = $this->db->table('enfermo')->where('id_animal', [$id])->get(1)->getResultArray();
                if (count($query) > 0) {                   
                    $builderE->delete(['id_animal' => $id]);
                }
            }
            //Sacrificio
            $builderS = $this->db->table('sacrificio');
            if($data['fecha-sacrificio'] != ''){                
                $query = $this->db->table('sacrificio')->where('id_animal', [$id])->get(1)->getResultArray();
                if (count($query) > 0) {
                    $sacrificio = [ 'fecha' => $data['fecha-sacrificio'], ];
                    $builderS->update($sacrificio, ['id_animal' => $id]);
                }                 
                else {
                    $sacrificio = [ 'fecha' => $data['fecha-sacrificio'], 'id_animal' => $id, ];
                    $builderS->insert($sacrificio);
                }
            } else {
                $query = $this->db->table('sacrificio')->where('id_animal', [$id])->get(1)->getResultArray();
                if (count($query) > 0) {                   
                    $builderS->delete(['id_animal' => $id]);
                }
            }
           
            //Muerto
            $builderM = $this->db->table('muerto');
            if($data['causa-muerte'] != ''){                
                $query = $this->db->table('muerto')->where('id_animal', [$id])->get(1)->getResultArray();
                if (count($query) > 0) {
                    $muerto = [ 'causa' => strtolower($data['causa-muerte']), ];
                    $builderM->update($muerto, ['id_animal' => $id]);
                }                 
                else {
                    $muerto = [ 'causa' => strtolower($data['causa-muerte']), 'id_animal' => $id, ];
                    $builderM->insert($muerto);
                }
            } else {
                $query = $this->db->table('muerto')->where('id_animal', [$id])->get(1)->getResultArray();
                if (count($query) > 0) {                   
                    $builderM->delete(['id_animal' => $id]);
                }
            }
            
            //AnimalComprado
            $builderAC = $this->db->table('animal_comprado');
            if($data['precio'] != 0){                
                $query = $this->db->table('muerto')->where('id_animal', [$id])->get(1)->getResultArray();
                if (count($query) > 0) {
                    $animalComprado = [ 'precio' => $data['precio'], ];
                    $builderAC->update($animalComprado, ['id_animal' => $id]);
                }                 
                else {
                    $animalComprado = [ 'precio' => $data['precio'], 'id_animal' => $id, ];
                    $builderAC->insert($animalComprado);
                }
            } else {
                $query = $this->db->table('animal_comprado')->where('id_animal', [$id])->get(1)->getResultArray();
                if (count($query) > 0) {                   
                    $builderAC->delete(['id_animal' => $id]);
                }
            }

            print_r('ok');
            return;
        } else {
            print_r('error');
        }           
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