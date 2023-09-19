<?php

class UserController{
    
    public function create($email, $name, $pwd)
    {
        try{
            $usrModel = new UserModel;
           
            $_SESSION[APP_TAG]['connected']['use_login'] = $usrModel->create($email, $name, $pwd);            

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function subscribe()
    {
        include './views/user/create.php';
    }

    public function connect()
    {
        include './views/user/login.php';
    }


}