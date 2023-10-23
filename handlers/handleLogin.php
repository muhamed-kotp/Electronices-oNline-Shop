<?php  

session_start();

require_once '../classes/Admins.php';
require_once '../classes/validation/Validator.php' ;


use Validation\Validator;

// var_dump($_POST['submit'])

// reading data    


if(isset( $_POST['submit'])) 
    {
        $email = $_POST['email'] ;
        $password = $_POST['password'] ;



        //validation 

        $valid = new Validator ;
        $valid->rules('Email',  $email, ['required','email','max:100']) ;
        $valid->rules('Password', $password, ['required', 'string']) ;
    
        $errors = $valid-> errors ;

        //is data is valid
        if($errors ==[])
            {
                $data = new  Admins; 
            
                $result = $data->attempt($email, sha1($password) ) ; 
            
                if ($result !== null ) {
                    $_SESSION['id'] = $result['id'] ;
                    $_SESSION['username'] = $result['username'] ;
                    header('location: ../index.php'); 
                }
                else{
                    $_SESSION['errors'] = ['your credientials are not correct'] ;
                    header('location:../login.php');       
                }
            
            }    

        //if Data is not valid
        else
            {
                $_SESSION['errors'] = $errors ;
                header('location:../login.php');
            }

    }
else
    {
        header('location: ../login.php');
    }






?>