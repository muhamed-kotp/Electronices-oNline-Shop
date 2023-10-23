<?php  

session_start();
if( ! isset($_SESSION['id']) ){
    header('location: login.php');
}
require_once '../classes/Products.php' ;

$ids = $_GET['id'] ;
$prod = new Products ;
$product = $prod ->getOne($ids);

if($product['img']!==null)
{

    $img_name = $product['img']; 
    unlink('../images/'.$img_name);
    $result = $prod->delete($ids);
}

if($result == true) {
    
}
else
{
    
}

header('location: ../index.php');  

?>