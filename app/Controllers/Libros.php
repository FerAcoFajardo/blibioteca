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

        // Validar que exista imagen
        $validacion = $this->validate([
            'nombre'=>'required|min_length[3]',
            'imagen'=>[
                'uploaded[imagen]',
                'mime_in[imagen,image/jpg,image/jpeg,image/png,image/gif]',
                'max_size[imagen,2048]',
            ]
        ]);

        if(!$validacion){
            $session=session();
            $session->setFlashdata('error', 'No se pudo guardar el libro');
            return redirect()->back()->withInput();
            // return redirect()->to(base_url('listar'));
        }

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
        }
        $libro->insert($datos);
        return redirect()->to(base_url('listar'));
    }



    // Función para borrar
    public function borrar($id=null){
        $libro = new Libro();
        $datos=$libro->where('id', $id)->first();

        $ruta=('../public/uploads/'.$datos['imagen']);
        unlink($ruta);

        $libro->where('id', $id)->delete();


        return redirect()->to(base_url('listar'));
    }
    
    // Función para borrar
    public function editar($id=null){
        
        $libro = new Libro();
        $datos['libro'] = $libro->where('id', $id)->first();

        $datos['header'] = view('template/header');
        $datos['footer'] = view('template/footer');
        

        return view('libros/editar', $datos);
    }


    // Función para actualizar
    public function actualizar(){
        $libro = new libro();

        $datos=[
            'nombre' => $this->request->getVar('nombre'),
        ];
        
        $id=$this->request->getVar('id');



        $validacion = $this->validate([
            'nombre'=>'required|min_length[3]',

        ]);

        if(!$validacion){
            $session=session();
            $session->setFlashdata('error', 'No se pudo actualizar el libro');
            return redirect()->back()->withInput();
            // return redirect()->to(base_url('listar'));
        }



        $libro->update($id,$datos);

        $validacion = $this->validate([
            'imagen' => [
                'uploaded[imagen]',
                'mime_in[imagen,image/jpg,image/jpeg,image/png,image/gif]',
                'max_size[imagen,2048]',
            ]
        ]);

        if($validacion){
            if($imagen=$this->request->getFile('imagen')){

                $datosLibro=$libro->where('id', $id)->first();
                $ruta=('../public/uploads/'.$datosLibro['imagen']);
                unlink($ruta);

                $nombre_imagen = $imagen->getRandomName();
                $imagen->move('../public/uploads/', $nombre_imagen);
                $datos=['imagen' => $nombre_imagen];
                $libro->update($id,$datos);
            }
            return redirect()->to(base_url('listar'));
        }

        return redirect()->to(base_url('listar'));
    }

    

}