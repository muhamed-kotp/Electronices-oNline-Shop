<?php  
namespace Validation ;

require_once 'ValidationInterface.php' ;

class Required implements ValidationInterface {

public $name ; 
public $value ;
public function __construct($name,$value)
{
    $this ->name = $name ; 
    $this->value = $value ;
}


public function validate(){
    if ( strlen($this->value) == 0  )
    {
        return "The $this->name field is required " ;
    }
        return "";
}
} 


?>