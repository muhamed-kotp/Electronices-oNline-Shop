<?php  

session_start();

if( ! isset($_SESSION['id']) ){
    header('location: login.php');
}
require_once '../classes/Categories.php';
require_once '../classes/helpers/Images.php' ;
require_once '../classes/validation/Validator.php' ;

use Validation\Validator;
use Classes\Helpers\Images ;

// var_dump($_POST['submit'])

// reading data    


if(isset( $_POST['submit'])) 
    {
        $type = $_POST['type'] ;
        $img  = $_FILES['img'];

        $images = new Images($img) ;
        //validation 

        $valid = new Validator ;
        $valid->rules('Categoty Type',  $type, ['required','string','max:100']) ;
        $valid->rules('Image',  $img,  ['image_required','iamge']) ;
      

        $errors = $valid-> errors ;

        // $_SESSION['errors'] = $valid->errors ;

        //is data is valid
        if($valid->errors ==[])
            {
                $data = new Categories ; 
            
                $new_Cat = [
                    'type' => $type ,
                    'img' => $images-> img_new_name 
                ];
            
            
            
                $result = $data->store($new_Cat) ; 
            
                if ($result ==true ) {
                    $images ->upload() ;
                    header('location: ../index.php');
                }else{
                    header('location:../addCategory.php');        
                }
            
            }    

        //if Data is not valid
        else
            {
                $_SESSION['errors'] = $errors ;
                header('location:../addCategory.php');
            }

    }
else
    {
        header('location: ../index.php');
    }






?>