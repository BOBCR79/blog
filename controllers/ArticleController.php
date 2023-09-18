<?php

class ArticleController{

    public function index()
    {

        try 
        {
            $artModel = new ArticleModel();
    
          
            $datas = $artModel->viewAll();# id, titre, auteur, texte, horodatage, auteur

            $articles = [];

            if(count($datas) > 0){
                foreach($datas as $data){
                    $articles[] = new Article($data);
                }
            }
        
            include './views/article/index.php';

        } catch(Exception $e)
        {
            die($e->getMessage());
        }

    }

}