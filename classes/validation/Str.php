<?php  
namespace Validation ;

require_once 'ValidationInterface.php' ;

class Str implements ValidationInterface {

public $name ; 
public $value ;
public function __construct($name,$value)
{
    $this ->name = $name ; 
    $this->value = $value ;
}


public function validate(){
    if (! is_string($this->value)   )
    {
        return "The $this->name field must be string " ;
    }
        return "";
}
} 


?>