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

$ids = $_GET['id'] ;
$prod = new Products ;
$product = $prod->getOne($ids);
$old_img = $product['img'] ;


// reading data   

if(isset($_POST['submit']))
{
    $name = $_POST['name'] ;
    $price = $_POST['price'] ;
    $quantity = $_POST['quantity'] ;
    $category_id = $_POST['category_id'] ;
    $desc = $_POST['desc'] ;
    $img  = $_FILES['img'];
    $img_size = $img['size'];
    

    //validation 

    $valid = new Validator ;
    $valid->rules('Name',  $name, ['required','string','max:100']) ;
    $valid->rules('Price', $price, ['required','numeric']) ;
    $valid->rules('Qantity', $quantity, ['required','numeric']) ;
    $valid->rules('Category', $category_id, ['required','numeric']) ;
    $valid->rules('Description',  $desc,  ['required','string']) ;



//if there is a new image 

    if($img_size!== 0){
        
        $valid->rules('Image',  $img,  ['iamge']) ;
        // var_dump($img) ;
        $images = new Images($img) ;


        $new_product = [
            'name' => $name ,
            'price' => $price ,
            'desc' => $desc ,
            'quantity' => $quantity ,
            'category_id' => $category_id ,
            'img' => $images-> img_new_name  
        ];
        unlink('../images/'.$old_img);
        $images ->upload() ;
    }

    //if there is not a new  image 
    else {
        $new_product = [
            'name' => $name ,
            'price' => $price ,
            'desc' => $desc ,
            'quantity' => $quantity ,
            'category_id' => $category_id ,
            'img' => $old_img  
        ];
    }

    $errors = $valid-> errors ;

    if($valid->errors ==[]){
        $result = $prod->update($ids, $new_product) ; 

        if ($result ==true ) {
            header('location:../show.php?id='.$ids);
        }else{
            header('location: ../index.php');       
        }
    }
    else 
    {
        $_SESSION['errors'] = $errors ;
        header("location:../edit.php?id=$ids");
    }
    
    // $img_name = $img['name'] ;

    // var_dump($img);


   

}
else
{
    header('location: ../index.php');
}


?>