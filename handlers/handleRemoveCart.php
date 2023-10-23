<?php  

session_start();

$ids = $_GET['id'] ;
$arr = [] ;
array_push($arr, $ids) ;

$_SESSION['cart']=array_diff($_SESSION['cart'],$arr);
header('location:../buy.php');  

// echo $id;
?>