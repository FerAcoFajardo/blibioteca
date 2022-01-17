<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
// Usar el modelo Libro
use App\Models\Libro;

class Libros extends Controller{
    
    public function index(){

        $libro = new Libro();
        $datos['libros'] = $libro->orderBy('id', 'ASC')->findAll();

        $datos['header'] = view('template/header');
        $datos['footer'] = view('template/footer');

        return view('libros/listar', $datos);
    }

    public function crear(){

        $datos['header'] = view('template/header');
        $datos['footer'] = view('template/footer');

        return view('libros/crear', $datos);
    }

    public function guardar(){
        $libro = new Libro();
        $nombre = $this->request->getVar('nombre');

        if($imagen=$this->request->getFile('imagen')){
            $nombre_imagen = $imagen->getRandomName();
            $imagen->move('../public/uploads/', $nombre_imagen);
            $datos=[
                'nombre' => $nombre,
                'imagen' => $nombre_imagen
            ];
        }else{
            $datos=[
                'nombre' => $nombre,
            ];
            echo "No se subió ninguna imagen
            <br>";
        }
        $libro->insert($datos);
        echo "Ingresado a la BD";
    }

}