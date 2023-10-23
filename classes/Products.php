<?php   

require_once 'MySql.php' ;

class Products extends MySql {


    public function getAll()
    {
        $query = "SELECT * FROM products" ;
        $result = $this->connection()->query($query) ;
        $products = [] ;

        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                array_push($products,$row) ;
            
            }
        }
            return $products ;
    }

    
    public function getOne($id)
    {
        $query = "SELECT * FROM products 
                    WHERE id = '$id' " ;
        
        $result = $this-> connection()->query($query);
        $product = null ; 

        if($result ->num_rows ==1 )
        {
            $product = $result->fetch_assoc() ;
        }
        return $product ;
    }


    public function store(array $data)
    {
        $data['name'] = mysqli_real_escape_string($this->connection(), $data['name']) ;
        $data['desc']= mysqli_real_escape_string($this->connection(), $data['desc']) ;
        $query = "INSERT INTO products (`name`, `desc`, `price`, `img`, `quantity`, `category_id` , `date`)
                    VALUES ('{$data['name']}', '{$data['desc']}', '{$data['price']}','{$data['img']}','{$data['quantity']}','{$data['category_id']}', CURRENT_TIME() )" ;
        
        $result = $this->connection() ->query($query) ;

        if($result== true){
            return true ;
        }
            return false ;
    }


    public function update($id, array $data)
    {
        $data['name'] = mysqli_real_escape_string($this->connection(), $data['name']) ;
        $data['desc']= mysqli_real_escape_string($this->connection(), $data['desc']) ;
        $query = "UPDATE products SET 
                    `name`        = '{$data['name']}', 
                    `desc`        = '{$data['desc']}', 
                    `price`       = '{$data['price']}', 
                    `img`         = '{$data['img']}',
                    `quantity`    = '{$data['quantity']}',
                    `category_id` = '{$data['category_id']}'
                    WHERE id = '$id' " ;
        
        $result = $this->connection()->query($query) ;
        if($result== true){
            return true ;
        }
            return false ;

    }

    public function delete($id)
    {
        $query = "DELETE FROM products
                    WHERE id= '$id'" ; 

        $result = $this -> connection()->query($query) ;
        if($result== true){
            return true ;
        }
            return false ;

    }
}
?>