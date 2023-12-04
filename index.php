<?php
session_start();
require 'views/inc/head.php';

require 'config/ini.php';
require 'lib/autoload.php';
require 'lib/functions.php';

require 'lib/_helpers/tools.php';
require 'views/inc/navbar.php';
// 
// var_dump($_SESSION);
// var_dump($_POST);
if (!empty($_POST['email'])){
  if(!empty($_GET['c'])){
    $controllerName = ucfirst($_GET['c']). 'Controller';
    if(class_exists($controllerName)){
      $controller = new $controllerName;
    }
  }else {
    $controller = new ArticleController;
  }

  if(!empty($_GET['a'])){
    $methodName = $_GET['a'];
    if(method_exists($controller, $methodName)){
      switch ($_GET['a']){
        case 'create':
          $controller->$methodName($_POST['email'],$_POST['name'],$_POST['pwd']);
        break;
        case 'login':
          $controller->$methodName($_POST['email'],$_POST['pwd']);
          
        break;
        
      }
    }
  }else {
    $controller->index();
  }
// si pas de POST
}else
{
  if(!empty($_GET['c'])){
    $controllerName = ucfirst($_GET['c']). 'Controller';
    if(class_exists($controllerName)){
      $controller = new $controllerName;
    }
  }else {
    $controller = new ArticleController;
  }

  if(!empty($_GET['a'])){
    $methodName = $_GET['a'];
    if(method_exists($controller, $methodName)){
      $controller->$methodName();
    }
  }else {
      $controller->index();
  }

}





















