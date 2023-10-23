<?php   

require_once 'MySql.php' ;

class Orders extends MySql {


    public function getAll()
    {
        $query = "SELECT * FROM orders" ;
        $result = $this->connection()->query($query) ;
        $orders = [] ;

        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                array_push($orders,$row) ;
            
            }
        }
            return $orders ;
    }

    
    public function getOne($customerEmail)
    {
        $query = "SELECT * FROM orders 
                    WHERE customerEmail = '$customerEmail' " ;
        
        $result = $this-> connection()->query($query);
        $orders = null ; 

        if($result ->num_rows ==1 )
        {
            $orders = $result->fetch_assoc() ;
        }
        return $orders ;
    }


    public function store(array $data)
    {
        $data['customerName'] = mysqli_real_escape_string($this->connection(), $data['customerName']) ;
        $data['customerEmail']= mysqli_real_escape_string($this->connection(), $data['customerEmail']) ;
        $data['customerAddress']= mysqli_real_escape_string($this->connection(), $data['customerAddress']) ;
        $query = "INSERT INTO orders (`customerName`, `customerEmail`, `customerPhone`, `customerAddress`)
                    VALUES ('{$data['customerName']}', '{$data['customerEmail']}', '{$data['customerPhone']}','{$data['customerAddress']}' )" ;
        
        $result = $this->connection() ->query($query) ;

        if($result== true){
            return true ;
        }
            return false ;
    }

    public function delete($customerEmail)
    {
        $query = "DELETE FROM orders
                    WHERE order_id = '$customerEmail'" ; 

        $result = $this -> connection()->query($query) ;
        if($result== true){
            return true ;
        }
            return false ;

    }
}
?>