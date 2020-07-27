<?php

class Core
{
    protected $controllerCurrent = 'Paginas';
    protected $methodCurrent = 'index';
    protected $parameter = [];

    public function __construct()
    {
        //print_r($this->getUrl());
        $url = $this->getUrl();
        $this->checkIfTheControllerExist( $url );
        $this->checkIfTheMethodExist($url);

        //obtener parametros
        $this->parameter = $url ? array_values($url) : [];
        //llamar callback con parametros array
        call_user_func_array([$this->controllerCurrent,$this->methodCurrent],$this->parameter);
    }

    public function checkIfTheControllerExist( $url ){
        if( isset($url[0]) ){
            if( file_exists('../app/controller/'.ucwords($url[0]).'.php') ){
                //si existe se setea como controlador por defecto
                $this->controllerCurrent = ucwords($url[0]);

                //unset indice
                unset($url[0]);
            }
        }
        require_once '../app/controller/'.$this->controllerCurrent. '.php';
        $this->controllerCurrent = new $this->controllerCurrent;
    }
    public function checkIfTheMethodExist($url){
        //chequeamos la segunda parte de la url
        // [recorodar que la variable url probiene del .htacess index.php?url=$1]
        if( isset($url[1]) ){
            if ( method_exists( $this->controllerCurrent, $url[1])) {
                //chequemos el metodo
                $this->methodCurrent = $url[1];
                //unset indice
                unset($url[1]);
            }
        }
    }
    public function getUrl()
    {
        if( isset( $_GET['url']) ){
            $url = rtrim($_GET['url'],'/');
            $url = filter_var($url,FILTER_SANITIZE_URL);
            $url = explode('/',$url);
            return $url;
        }
    }
}