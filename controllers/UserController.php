<?php

class UserController{
    
    public function create($email, $name, $pwd)
    {
        try{
            $usrModel = new UserModel;
            $hash = PWD::hash($pwd);
            $_SESSION[APP_TAG]['connected']['use_login'] = $usrModel->create($email, $name, $hash);            

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function subscribe()
    {
        include './views/user/create.php';
    }
}