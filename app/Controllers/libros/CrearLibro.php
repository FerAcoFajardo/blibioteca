<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

class CrearLibro extends Controller{
    public function form(){
        return view('libros/crear');
    }

}