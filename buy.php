<?php  
session_start();
require_once 'classes/Products.php' ;
require_once 'classes/Categories.php';
require_once 'header.php';
require_once 'classes/helpers/Str.php' ;
use Classes\Helpers\Str ;

// unset($_SESSION['cart']) ;

// $prod = $product->getOne()

// var_dump( $_SESSION['cart'] );

if ( isset($_POST["plus-btn"]))
{
    $id = $_POST["plus"];
    $prod = new Products ;
    $product = $prod->getOne($id);
    $prod_quantity = $product["quantity"] ;
    if(count($_SESSION["prod $id"])<$prod_quantity ) {
        array_push($_SESSION["prod $id"] , ",") ;
    }
}
if ( isset($_POST["minus-btn"]))
{
    $id = $_POST["minus"];
    if(count($_SESSION["prod $id"])>1 ){
        array_pop($_SESSION["prod $id"] ) ;
    }
    
}
?>

<?php  if(! isset($_SESSION['cart'])){?>
<div class="container d-flex flex-column justify-content-center align-items-center"
    style=" margin-bottom:250px;margin-top: 6rem;">
    <h3 class="text-center mb-5">Your Cart Is Empty !</h3>
    <a href="index.php" class="btn VIEW_btn fw-bolder  ">Continue Shopping </a>
</div>
<?php  }else{ ?>

<div style="margin-top: 6rem;margin-bottom: 3rem;" class="container">


    <table class="table  table-hover">
        <thead>
            <tr>

                <th class="change-font" scope="col">Image</th>
                <th class="change-font" scope="col">Name</th>
                <th class="change-font dis_none_sm dis_none_md" scope="col">Description</th>
                <th class="change-font" scope="col">Price</th>
                <th class="change-font" scope="col">Quantity</th>
            </tr>
        </thead>

        <?php
        $sum =0 ;
        if(isset($_SESSION['cart']))
        {
            
            foreach ($_SESSION['cart'] as $cartId) 
            { 
                $prod = new Products ;
                $cat = new Categories ;
                $product = $prod->getOne($cartId) ; 
                $category = $cat->getOne($product['category_id']) ;
                $total = $product['price'] * count($_SESSION["prod $cartId"]);
                $sum += $total ;

        ?>
        <tbody>
            <tr>

                <td><a href="show.php?id=<?php  echo $product['id']; ?>"> <img style="width: 150px;"
                            src="images/<?php echo $product['img'] ;?>" class="img-fluid "> </a></td>
                <td><?php echo   $product['name']  ?></td>
                <td class="dis_none_sm dis_none_md">
                    <?php echo Str::limit($product['desc'],300)   ?> </td>

                <td><?php echo $product['price']  ?></td>
                <td>
                    <div class="control">

                        <form method="post" action="buy.php">
                            <input type="hidden" value="<?php echo $cartId ?>" name="plus">
                            <button class="blus-cont" type="submit" name="plus-btn"><i
                                    class="fa-solid fa-plus blus"></i></button>
                        </form>
                        <span class="break">|</span>
                        <span class="quantity_number"><?php  echo count($_SESSION["prod $cartId"]) ?></span>
                        <span class="break">|</span>

                        <form method="post" action="buy.php">
                            <input type="hidden" value="<?php echo $cartId ?>" name="minus">
                            <button class="minus-cont" type="submit" name="minus-btn"><i
                                    class="fa-solid fa-minus minus"></i></button>
                        </form>

                        <a class="recycle-cont" href="handlers/handleRemoveCart.php?id=<?php echo $product['id']; ?>"><i
                                class="fa-solid fa-basket-shopping recycle"></i></a>
                    </div>
                </td>
            </tr>
        </tbody>
        <?php  } ?>
        <?php  } ?>
    </table>

    <div class="total">
        <h4>Total Price:</h4>
        <h4 class="mx-5 ">$ <?php echo $sum  ?></h4>
    </div>
</div>

<div class="container d-flex justify-content-center" style=" margin-bottom:250px">
    <a href="checkOut.php" class="btn VIEW_btn fw-bolder  ">Proceed To Check Out </a>
</div>

<?php  } ?>


<?php  require_once 'footer.php'; ?>