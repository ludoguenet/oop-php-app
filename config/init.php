<?php

require_once 'config.php';


spl_autoload_register('myAutoLoader');

function myAutoLoader($class_name) {
    if ($class_name === 'Database\PDOConnection') {
        require_once ($class_name.'.php');
    } else {
        require_once ('Controllers/'.$class_name.'.php');
    }
}

