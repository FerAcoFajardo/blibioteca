<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

class EditarLibro extends Controller{
    // Función que se ejecuta al cargar la página de editar libro
    public function formulario(){
        return view('libros/editar');
    }

}