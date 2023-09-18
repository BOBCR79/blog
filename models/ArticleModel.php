<?php

class ArticleModel extends CoreModel{


     public function viewAll()
     {#à limiter ou mettre en cache
        try
        {
            if (($req = $this->getDb()->prepare("SELECT art_id AS id, art_titre AS titre, art_texte AS texte, art_date AS horodatage, user.usr_nom AS auteur FROM article LEFT JOIN user ON art_usr_fk=user.usr_id"))!==false){
                                 
                        if ($req -> execute()){
                            $data = $req->fetchAll(PDO::FETCH_ASSOC);
                            $req ->closecursor();
                            return $data; # id, titre, auteur, texte, horodatage, auteur
                        }else {
                            $req ->closecursor();
                            header('location index.php?error=500');     
                            exit;
                            //header
                        }           
           
               
            }


        }catch(PDOException $e)
        {
            die($e->getMessage());

        }

    }



}