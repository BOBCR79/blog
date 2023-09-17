<?php 

function debug($var){
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}
function debugArray(array $array, int $start, int $items){
    for($i=$start;$i<$items+$start;$i++){
        echo '<p>record: '.($i+1).'</p>';
        echo '<pre>';
        var_dump($array[$i]);
        echo '</pre>';
        echo '<hr>';        
    }
}



class dbg {
    # multi-row array or object
    public static function arr($array, int $start, int $items)
    {
        for($i=$start;$i<$items+$start;$i++){
            echo '<p>record: '.($i+1).'</p>';
            echo '<pre>';
            var_dump($array[$i]);
            echo '</pre>';
            echo '<hr>';        
        }
    }
    #var_dump classique
    public static function vd($data){
        echo '<hr>';
        echo '<pre>'.var_dump($data).'</pre>';
        echo '<hr>';
    }

}

class select{
    #parcours array simple pour afficher options
    #@param $valueCol -> value string 
    #@param $nameCol -> texte string
    #@param $optional
    public static function array(array $array, string $valueCol, string $nameCol, $optional='')
    {
        foreach($array as $data){
            echo '<option value=" '.$data[$valueCol].'" '.$optional.' />'.$data[$nameCol].'<option/>';
        }
    }

}


