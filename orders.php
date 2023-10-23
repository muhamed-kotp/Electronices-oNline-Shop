<?php  
session_start();
require_once 'classes/Products.php' ;
require_once 'classes/Orders.php' ;
require_once 'classes/Orderdetails.php' ;
require_once 'classes/Categories.php';
require_once 'header.php';

$ord = new Orders ;
$orders = $ord ->getAll() ;
$ordDet = new Orderdetails ;
$orederDetails = $ordDet -> getAll() ;
$prod = new Products ;


// unset($_SESSION['cart']) ;

// $prod = $product->getOne()
?>



<div style="margin-top: 6rem;margin-bottom: 250px;" class="container">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Customer Name</th>
                <th class="dis_none_md" scope="col">Customer Email</th>
                <th scope="col">Customer Phone</th>
                <th class="dis_none_sm" scope="col">Customer Address</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Price</th>
            </tr>
        </thead>

        <?php
            $x =0 ; 
            foreach ($orders as $order) 
            { 
                $orderId = $order['order_id'] ; 
                $x = $x +1 ;
               foreach ($orederDetails as $eachOrder){
                if ($eachOrder['order_id'] == $orderId)
                    {
                        $productID =  $eachOrder['product_id'] ;
                        $product = $prod->getOne($productID) ;
                        
        ?>
        <tbody>
            <tr>
                <th scope="row"><?php  echo $x ?></th>
                <td><?php echo   $order['customerName']  ?></td>
                <td class="dis_none_md"><?php echo   $order['customerEmail'] ?> </td>
                <td><?php echo   $order['customerPhone']  ?></td>
                <td class="dis_none_sm"><?php echo   $order['customerAddress']  ?></td>
                <td><?php echo   $product['name']  ?></td>
                <td><?php echo   $product['price']  ?></td>
            </tr>
        </tbody>
        <?php  } ?>
        <?php  } ?>
        <?php  } ?>

    </table>
</div>


<?php  require_once 'footer.php'; ?>