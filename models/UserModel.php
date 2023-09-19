<?php

class UserModel extends CoreModel
{

    public function login($email,$pwd)
    {
        

        try
        {
            if (($req = $this->getDb()->prepare("SELECT usr_nom AS name, usr_email AS email, usr_pwd AS pwd FROM user WHERE usr_email=:email"))!==false){
                if ($req -> bindValue('email', $email))
                {                   
                    if ($req -> execute()){                    
                        $res = $req -> fetch(PDO::FETCH_ASSOC);
                        if(PWD::verify($pwd,$res['pwd']))#class PWD dans function
                        {
                            $_SESSION[APP_TAG]['connected']['use_login'] = $res;
                            
                            $req->closecursor();
                           
                            header('location: index.php');
                            exit;
                        }else
                        {
                            echo 'Erreur de login ou de mot de passe!';                            
                            $req ->closecursor();
                            header('location: index.php');
                            exit;
                        }
                        
                    }else {
                        echo 'Un problème est survenu dans l\'exécution de la requête!';
                        $req ->closecursor();
                        //header
                    }
               
                }else{ echo 'Erreur de login ou de mot de passe!';
                    $req ->closecursor();
                    //header
                }
                $req ->closecursor();
            }


        }catch(PDOException $e)
        {
            die($e->getMessage());

        }
    }


    public function create($email, $name, $pwd)
    {
        $pwd = password_hash($pwd,PASSWORD_DEFAULT);
        try
        {
            // if (($check = $this->getDb()->query("SELECT usr_nom AS nom FROM user WHERE usr_email = ".$email." OR usr_nom = ".$name))!==true)
            // {    if ($req -> execute()){
            //         $data = $req -> fetchAll(PDO::FETCH_ASSOC);
            //         $req ->closecursor();
            //         if (!(count($data) > 0)){                
                        

                        if (($req =$this->getDb()->prepare("INSERT INTO user (usr_nom, usr_email, usr_mdp) VALUES (:name, :email, :pwd)"))!==false)
                        {
                            if (($req -> bindValue('email', $email)) && $req->bindValue('name',$name)){
                                if ($req -> bindValue('pwd', $pwd)){
                                    if ($req -> execute()){
                                        $req ->closecursor();
                                        header('location index.php?newaccount=ok');                            
                                        exit;
                                    }else {
                                        header('location index.php?newaccount=failed');     
                                        exit;
                                                        
                                    }
                                }else { echo 'Un problème de mot de passe!';
                                    $req ->closecursor();
                                    //header
                                }
                            }else{ echo 'Un problème de mot de login!';
                                $req ->closecursor();
                                //header
                            }
                            $req ->closecursor();
                        }    
                    // }else return $data['nom'];
                // }
            // }# else can't read database
        }catch(PDOException $e)
        {
            die($e->getMessage());

        }


    }

    public function edit($id, $email, $name, $pwd)
    {
        
        try
        {
            if (($req = $this->getDb()->prepare("INSERT INTO user( usr_nom, usr_email, usr_mdp) VALUES (:name, :email, :pwd)"))!==false){
                if (($req -> bindValue('email', $email)) && $req->bindValue('name',$name)){
                    if ($req -> bindValue('pwd', $pwd)){
                        if ($req -> execute()){
                            
                            $req ->closecursor();
                            header('location index.php?edit=ok');                            
                            exit;
                        }else {
                            header('location index.php?edit=failed');     
                            exit;
                            //header
                        }
                    }else { echo 'Un problème de mot de passe!';
                        $req ->closecursor();
                        //header
                    }
                }else{ echo 'Un problème de mot de login!';
                    $req ->closecursor();
                    //header
                }
                $req ->closecursor();
            }


        }catch(PDOException $e)
        {
            die($e->getMessage());

        }
    }

    private function duplicateCheck($email, $name)
    {
        
        try
        {
            if (($req = $this->getDb()->prepare("SELECT usr_nom AS nom FROM user WHERE usr_email = :email OR usr_nom = :name"))!==false){
                if ($req -> bindValue('email', $email)){
                    if ($req -> bindValue('name', $name)){
                        if ($req -> execute()){
                            $res = $req -> fetch(PDO::FETCH_ASSOC);
                            $req ->closecursor();
                            if (!empty($res['nom'])) {
                                return true;
                            }         
                            
                        }else {
                            $req ->closecursor();
                            header('location index.php?edit=failed');     
                            exit;
                            //header
                        }
                    }else { echo 'Un problème de mot de passe!';
                        $req ->closecursor();
                        //header
                    }
                }else{ echo 'Un problème de mot de login!';
                    $req ->closecursor();
                    //header
                }
                $req ->closecursor();
            }


        }catch(PDOException $e)
        {
            die($e->getMessage());

        }
    }

}