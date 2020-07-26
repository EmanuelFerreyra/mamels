<?php


namespace app\lib;


class Core
{
    protected $controllerCurrent = 'Paginas';
    protected $methodCurrent = 'index';
    protected $parameter = [];

    public function __construct()
    {
        //print_r($this->getUrl());
        $url = $this->getUrl();
        $this->lookIfTheControllerExist( $url );
    }

    public function lookIfTheControllerExist( $url ){
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