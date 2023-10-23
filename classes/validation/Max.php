<?php  
namespace Validation ;

require_once 'ValidationInterface.php' ;

class Max implements ValidationInterface {

public $name ; 
public $value ;
public function __construct($name,$value)
{
    $this ->name = $name ; 
    $this->value = $value ;
}


public function validate(){
    if (strlen($this->value) > 100 )
    {
        return "The $this->name field must be less than 100 character " ;
    }
        return "";
}
} 


?>