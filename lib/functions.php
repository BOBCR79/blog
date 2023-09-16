<?php

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);   
    return $data;
  }



class PWD{


    public static function hash($password) :string {
      return password_hash($password);
    }

    public static function verify(string $password, string $hash) :boolean{
      return password_verify($password,$hash);

    }

    

}