<?php  

session_start();

require_once '../classes/Orders.php';
require_once '../classes/Orderdetails.php';
require_once '../classes/Products.php' ;
require_once '../classes/validation/Validator.php' ;




use Validation\Validator;

// var_dump($_POST['submit'])

// reading data    


if(isset( $_POST['submit'])) 
    {
        $customerName = $_POST['customerName'] ;
        $customerEmail = $_POST['customerEmail'] ;
        $customerPhone = $_POST['customerPhone'] ;
        $customerAddress = $_POST['customerAddress'] ;




        //validation 

        $valid = new Validator ;
        $valid->rules('User name',  $customerName, ['required','string','max:100']) ;
        $valid->rules('Email', $customerEmail, ['required','email', 'max:100']) ;
        $valid->rules('Phone', $customerPhone, ['required','string', 'max:100']) ;
        $valid->rules('Address', $customerAddress, ['required','string']) ;


        $errors = $valid-> errors ;

        // $_SESSION['errors'] = $valid->errors ;

        //is data is valid
        if($errors ==[])
            {
                //store data

                $new_order = [
                    'customerName' => $customerName ,
                    'customerEmail' => $customerEmail ,
                    'customerPhone' => $customerPhone ,
                    'customerAddress' => $customerAddress ,
                ];

                $data = new Orders ; 
                $result1 = $data->store($new_order) ; 

                foreach($_SESSION['cart'] as $cartId)
                {
                    $prod = new Products ;
                    $product = $prod->getOne($cartId) ;
                    $prodQuantiy = count($_SESSION["prod $cartId"]);
                    $prodNewQuantity =$product['quantity'] - $prodQuantiy ;

                    $new_product = [
                        'name' => $product['name'] ,
                        'price' => $product['price'] ,
                        'desc' => $product['desc'] ,
                        'quantity' => $prodNewQuantity ,
                        'category_id' => $product['category_id'] ,
                        'img' => $product['img']  
                    ];
                    $prod->update($cartId,$new_product);
                    $ord = new Orders ;
                    $order = $ord->getOne($customerEmail) ;
                    // $order_id =   ;
                    $orderDetailsArr = [
                        'order_id' =>  $order['order_id'],
                        'product_id' => $cartId,
                        'priceEach' =>  $product['price'],
                        'quantity_order'=> $prodQuantiy
                    ];

                    $orderDetailsOpj = new Orderdetails ;
                    $result2 = $orderDetailsOpj->store($orderDetailsArr) ;
                }




                // if data stored successfully
                if ($result1 ==true && $result2 ==true  ) {
                    session_destroy();
                    header('location:../index.php');
                }
                 // if data did not store successfully
                else{
                    $_SESSION['errors'] = ['error storing in database'] ;
                    header('location:../checkOut.php');        
                }
            }    

        //if Data is not valid
        else
            {
                $_SESSION['errors'] = $errors ;
                header('location:../checkOut.php');
            }

    }
else
    {
        header('location: ../checkOut.php');
    }






?>