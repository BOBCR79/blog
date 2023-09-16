<?php

class User{

    private $_id;
    private $_name;
    private $_email;
    private $_pwd;

    public function __construct($datas)
    {
        $this->hydrate($datas);
    }

    
    public function setId(int $value) {
        $this->_id = $value;
    }

    public function getId() : int {
        return $this->_id;
    }


    
    public function setName(string $value) {
        $this->_name = $value;
    }

    public function getName() : string{
        return $this->_name;
    }


   
    public function setEmail(string $value) {
        $this->_email = $value;
    }

    public function getEmail() : string{
        return $this->_email;
    }


    public function setPwd(string $value) {
        $this->_pwd = $value;
    }

    public function getPwd() : string{
        return $this->_pwd;
    }

//ajouter ensuite: avatar, description






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