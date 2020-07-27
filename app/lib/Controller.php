<?php


//controlador principal se encargar de cargar las vistas y modelos

class Controller
{
    public function model( $model )
    {
        require_once '../app/model/'.$model.'.php';
        return new $model;
    }

    public  function view( $view, $datos = [] )
    {
        if ( file_exists('../app/view/'.$view.'.php')){
            require_once '../app/view/'.$view.'.php';
        }else{
            die('La vista no existe');
        }
    }
}