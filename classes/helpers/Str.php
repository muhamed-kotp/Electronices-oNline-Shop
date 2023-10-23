<?php  

namespace Classes\Helpers ;
class Str {
    public static function limit($str,$num = 30)
    {
        if(strlen($str)>$num ){
           $str =  substr($str,0,$num).'...';
        }
        return $str ;
    }
}


?>