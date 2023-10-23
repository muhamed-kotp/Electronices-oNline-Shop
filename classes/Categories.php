<?php   


require_once 'MySql.php' ;

class Categories extends MySql {


    public function getAll()
    {
        $query = "SELECT * FROM categories" ;
        $result = $this->connection()->query($query) ;
        $categories = [] ;

        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                array_push($categories,$row) ;
            
            }
        }
            return $categories ;
    }

    
    public function getOne($id)
    {
        $query = "SELECT * FROM categories 
                    WHERE category_id = '$id' " ;
        
        $result = $this-> connection()->query($query);
        $categories = null ; 

        if($result ->num_rows ==1 )
        {
            $categories = $result->fetch_assoc() ;
        }
        return $categories ;
    }


    public function store(array $data)
    {
        $data['type'] = mysqli_real_escape_string($this->connection(), $data['type']) ;

        $query = "INSERT INTO categories (`type`,`img`)
                    VALUES ('{$data['type']}', '{$data['img']}')" ;
        
        $result = $this->connection() ->query($query) ;

        if($result== true){
            return true ;
        }
            return false ;
    }
    public function delete($id)
    {
        $query = "DELETE FROM categories
                    WHERE category_id= '$id'" ; 

        $result = $this -> connection()->query($query) ;
        if($result== true){
            return true ;
        }
            return false ;

    }
}
?>