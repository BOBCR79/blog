<?php

class Article{
    private $_id;
    private $_title;
    private $_text;
    private $_date;
    private $_author;

    public function __construct($datas)
    {

        $this->hydrate($datas);

    }

    public function setId(int $value){
        $this->_id = $value;
    }

    public function getId() : int{
        return $this->_id;
    }

    public function setTitle($value){
        $this->_title=$value;
    }
    public function getTitle() : string{
        return $this->_title;
    }

    public function setText(string $value){
        $this->_text=$value;
    }
    public function getText() : string{
        return $this->_text;
    }

    public function setDate($value){
        $this->_date=$value;
    }
    public function getDate() {
        return $this->_date;
    }

    public function setAuthor(int $value){
        $this->_author=$value;
    }

    public function getAuthor() : int{
        return $this->_author;
    }

//ajouter ensuite: images (noms)



public function hydrate($datas){

    foreach($datas as $key => $value){

        # dans le cas ou on n'aliase pas les colonnes dans la requete
        # on enleve les 2 premières lettre du nom de la colonne (ex: n_id donc devient id)
        // $key = substr($key, 2);

        # on vérifie si le nom de la colonne se termine par _fk et si c'est le cas on lui enleve 
        if(substr($key, -3) == '_fk'){
            $key = substr($key, 0, -3);
        }

        $method = 'set' . ucfirst($key);
        if(method_exists($this, $method)){
            $this->$method($value);
        }
    }

}



}