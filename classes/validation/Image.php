<?php  
namespace Validation ;

require_once 'ValidationInterface.php' ;

class Image implements ValidationInterface {

public $name ; 
public $value ;
public function __construct($name,$value)
{
    $this ->name = $name ; 
    $this->value = $value ;
}


public function validate(){
    $types=['image/jpg','image/jpeg','image/png','image/gif'];
    if (strlen($this->value['name']) >  0 && ! in_array($this->value['type'] , $types  ))
    {
        return "The $this->name type must Be jpg, jpeg, png or gif " ;
    }
        return "";
}
} 


?>