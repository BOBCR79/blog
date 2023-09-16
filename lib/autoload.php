<?php 
# Charge les classes dans le dossier class
function loadClass($className){
    if(file_exists('class/'.$className.'.php')){
        require_once 'class/'.$className.'.php';
    }
}
spl_autoload_register('loadClass');


# Charge les modeles dans le dossier models
function loadModel($modelName){
    if(file_exists('models/'.$modelName.'.php')){
        require_once 'models/'.$modelName.'.php';
    }
}
spl_autoload_register('loadModel');


# Charge les controllers dans le dossier controllers
function loadController($controllerName){
    if(file_exists('controllers/'.$controllerName.'.php')){
        require_once 'controllers/'.$controllerName.'.php';
    }
}
spl_autoload_register('loadController');

