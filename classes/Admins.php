<?php  
require_once 'MySql.php' ;
class Admins extends MySql {
    public function attempt($email , $hashed_password) {
    
        $query = "SELECT * FROM admins 
                    WHERE email = '$email' and `password` ='$hashed_password' " ;
        
        $result = $this-> connection()->query($query);
        $user = null ; 

        if($result ->num_rows ==1 )
        {
            $user = $result->fetch_assoc() ;
        }
        return $user ;
    }
}

?>