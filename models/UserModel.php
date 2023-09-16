<?php

class UserModel extends CoreModel
{

    public function login($email,$pwd)
    {
        try
        {
            if (($req = $pdo->prepare("SELECT usr_nom AS name, usr_email AS email, usr_pwd AS pwd FROM user WHERE usr_email=:email"))!==false){
                if ($req -> bindValue('email', $email))
                {                   
                    if ($req -> execute()){                    
                        $res = $req -> fetch(PDO::FETCH_ASSOC);
                        if(PWD::verify($pwd,$res['pwd']))#class PWD dans function
                        {
                            $_SESSION[APP_TAG]['connected']['use_login']=$res;
                            $req ->closecursor();
                            header('location: index.php');
                            exit;
                        }else
                        {
                            echo 'Erreur de login ou de mot de passe!';
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

        try
        {
            if (($req = $pdo->prepare("INSERT INTO user (usr_nom, usr_email, usr_mdp) VALUES (:name, :email, :pwd)"))!==false){
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


        }catch(PDOException $e)
        {
            die($e->getMessage());

        }


    }

    public function edit($id, $email, $name, $pwd)
    {
        
        try
        {
            if (($req = $pdo->prepare("INSERT INTO user( usr_nom, usr_email, usr_mdp) VALUES (:name, :email, :pwd)"))!==false){
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

}