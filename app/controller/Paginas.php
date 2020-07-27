<?php



class Paginas extends Controller
{
    public function __construct()
    {
        //print 'Controlador paginas Cargado';
    }

    public function index(){
        $datos = [ 'title' => 'Bienvenidos a Framework Mamels'];
        $this->view('paginas/inicio',$datos);

    }

    public function articulo(){

    }

    public function update($id){
        print $id;
    }
}