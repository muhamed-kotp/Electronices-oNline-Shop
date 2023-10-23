<?php  
namespace Validation ;

require_once 'ValidationInterface.php' ;

class Numeric implements ValidationInterface {

public $name ; 
public $value ;
public function __construct($name,$value)
{
    $this ->name = $name ; 
    $this->value = $value ;
}


public function validate(){
    if (strlen($this->value) > 0 && !is_numeric($this->value) )
    {
        return "The $this->name field must Be a Valid Number " ;
    }
        return "";
}
} 


?>