<?php  

session_start();
if( ! isset($_SESSION['id']) ){
    header('location: login.php');
}
session_destroy();

header("location: ../login.php");

?>