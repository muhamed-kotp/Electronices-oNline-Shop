<?php   

require_once 'MySql.php' ;

class Orderdetails extends MySql {


    public function getAll()
    {
        $query = "SELECT * FROM orderdetails" ;
        $result = $this->connection()->query($query) ;
        $orderdetails = [] ;

        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                array_push($orderdetails, $row) ;
            
            }
        }
            return $orderdetails ;
    }

    
    public function getOne($id)
    {
        $query = "SELECT * FROM orderdetails 
                    WHERE id = '$id' " ;
        
        $result = $this-> connection()->query($query);
        $orderdetails = null ; 

        if($result ->num_rows ==1 )
        {
            $orderdetails = $result->fetch_assoc() ;
        }
        return $orderdetails ;
    }


    public function store(array $data)
    {

        $query = "INSERT INTO orderdetails (`order_id`, `product_id`, `priceEach`, `quantity_order`)
                    VALUES ('{$data['order_id']}', '{$data['product_id']}', '{$data['priceEach']}', '{$data['quantity_order']}')" ;
        
        $result = $this->connection() ->query($query) ;

        if($result== true){
            return true ;
        }
            return false ;
    }

    public function delete($id)
    {
        $query = "DELETE FROM orderdetails
                    WHERE id = '$id'" ; 

        $result = $this -> connection()->query($query) ;
        if($result== true){
            return true ;
        }
            return false ;

    }
}
?>