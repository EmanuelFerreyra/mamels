<?php

require_once '../app/iniciador.php';

spl_autoload_register(function( $class ){
    require_once 'lib/'.$class.'.php';
});

$core = new Core;

