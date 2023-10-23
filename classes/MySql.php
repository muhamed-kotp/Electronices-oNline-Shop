<?php   

class MySql {
    
    public $servername = "localhost";
    public  $username = "root";
    public  $password = "";
    public  $dbname = "online_shop";
    
    // Create connection
    public function connection ()
    {
        $conn = new mysqli($this -> servername, $this ->username,$this ->password, $this ->dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        
        return $conn ;
    }

}    

?>