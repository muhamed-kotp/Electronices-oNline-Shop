<?php  

session_start();

if( ! isset($_SESSION['id']) ){
    header('location: login.php');
}
require_once '../classes/Products.php';
require_once '../classes/helpers/Images.php' ;
require_once '../classes/validation/Validator.php' ;



use Classes\Helpers\Images ;
use Validation\Validator;

// var_dump($_POST['submit'])

// reading data    


if(isset( $_POST['submit'])) 
    {
        $name = $_POST['name'] ;
        $price = $_POST['price'] ;
        $quantity = $_POST['quantity'] ;
        $category_id = $_POST['category_id'] ;
        $desc = $_POST['desc'] ;
        $img  = $_FILES['img'];

        $images = new Images($img) ;


        //validation 

        $valid = new Validator ;
        $valid->rules('Name',  $name, ['required','string','max:100']) ;
        $valid->rules('Price', $price, ['required','numeric']) ;
        $valid->rules('Quantity', $quantity, ['required','numeric']) ;
        $valid->rules('Category', $category_id, ['required','numeric']) ;
        $valid->rules('Description',  $desc,  ['required','string']) ;
        $valid->rules('Image',  $img,  ['image_required','iamge']) ;

        $errors = $valid-> errors ;

        // $_SESSION['errors'] = $valid->errors ;

        //is data is valid
        if($valid->errors ==[])
            {
                $data = new Products ; 
            
                $new_product = [
                    'name' => $name ,
                    'price' => $price ,
                    'desc' => $desc ,
                    'quantity' => $quantity ,
                    'category_id' => $category_id ,
                    'img' => $images-> img_new_name 
                ];
            
            
            
                $result = $data->store($new_product) ; 
            
                if ($result ==true ) {
                    $images ->upload() ;
                    header("location:../category.php?id=$category_id");
                }else{
                    header('location:../add.php');        
                }
            
            }    

        //if Data is not valid
        else
            {
                $_SESSION['errors'] = $errors ;
                header('location:../add.php');
            }

    }
else
    {
        header('location: ../index.php');
    }






?>