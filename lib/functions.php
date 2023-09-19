<?php

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);   
    return $data;
  }



class PWD{

  public static function hash($password) :string {
    return password_hash($password,PASSWORD_DEFAULT);
  }

  #returns boolean
  public static function verify(string $password, string $hash){
    return password_verify($password,$hash);

  }
}

class FORM{

  public static function lbl($label,$id){
    echo '<label for="'.$id.'">'.$label.'</label>';

  }

  public static function txt($name,$id){
    echo '<input type="text" name="'.$name.'" id="'.$id.'">';
  }

  public static function email($name, $id, $required ='required'){
    echo '<input type="email" name="'.$name.'" id="'.$id.'" '.$required.'>';
  }

  public static function pwd($pwName, $id, $required ='required'){
    echo  '<input type="password" name="'.$pwName.'" id="'.$id.'" '.$required.'>';
  }


}




