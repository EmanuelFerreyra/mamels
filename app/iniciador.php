<?php
require_once 'config/Config.php';

spl_autoload_register(function( $class ){
    require_once 'lib/'.$class.'.php';
});