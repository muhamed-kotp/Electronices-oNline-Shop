<?php  

session_start();
if( ! isset($_SESSION['id']) ){
    header('location: login.php');
}
require_once '../classes/Categories.php' ;

$ids = $_GET['id'] ;
$cats = new Categories ;
$category = $cats->getOne($ids);

if($category['img']!==null)
{

    $img_name = $category['img']; 
    unlink('../images/'.$img_name);
    $result = $cats->delete($ids);
}



if($result == true) {
    
}
else
{
    
}

header('location:../index.php');  

?>