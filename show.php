<?php  
session_start();

require_once 'classes/Products.php' ;
require_once 'classes/Categories.php';
require_once 'header.php';

$ids = $_GET['id'] ;
$allData = new Products ;
$product = $allData->getOne($ids);

$cat = new Categories ;
$category = $cat->getOne($product['category_id']);

$_SESSION['prodID']= $ids ;
if(! isset($_SESSION['cart']))
{
    $_SESSION['cart'] = [];
    // $_SESSION['count'] = [];
}
if ( isset($_POST['cart']))
{
    if(!in_array($ids,$_SESSION['cart']))
    {
        array_push($_SESSION['cart'] , $_SESSION['prodID']) ;
        $_SESSION["prod $ids"] = [','] ;
    }
    else{
        // $_SESSION["$ids"] = $_SESSION["$ids"] + 1;
        array_push($_SESSION["prod $ids"] , ",") ;
    }
    // array_push($_SESSION['count'] , $_SESSION['prodID']) ; 
}
?>

<div class="container " style="margin-bottom :250px; ">
    <div class=" row ">
        <?php  if($product !== null) { ?>
        <div class="col-lg-6 mt-5">
            <img src="images/<?php echo $product['img'] ;?>" class="img-fluid ">
        </div>
        <div class="mt-5 col-lg-6">
            <div class="ms-5">
                <h4 class="fw-normal"><?php  echo $product['name']; ?></h4>
                <h4 class="fw-light"> <span class="fw-lighter fs-5">$</span><?php  echo $product['price']; ?></h4>
                <p><?php  echo $product['desc'] ?></p>
                <?php if( isset($_SESSION['id']) )  {  ?>

                <h5 class="fw-normal"> <span class="fw-bold"> Quantity :</span>
                    <?php  echo $product['quantity']; ?> Pieces</h5>
                <?php  } ?>
                <h5 class="fw-normal"><span class="fw-light"> Category :</span> <?php  echo $category['type']; ?></h5>
                <?php if( isset($_SESSION['id']) )  {  ?>

                <a href="edit.php?id=<?php  echo $product['id']; ?>" class="btn btn-info">Edit</a>
                <a href="#" class="btn btn-danger">delete</a>

                <?php  } ?>

                <div class="row">
                    <div class="col-lg-5">
                        <form method="post" action="show.php?id=<?php  echo $product['id']; ?>">
                            <input class="mt-5 btn VIEW_btn " type="submit" name="cart" value="Add to Cart" />
                        </form>
                    </div>

                    <div class="col-lg-3 ms-3">
                        <?php  if(isset($_POST['cart'])) { ?>
                        <a href="buy.php" class="mt-5 btn btn-success">Buy</a>
                        <?php  } ?>
                    </div>
                </div>



                <div>
                    <a href="category.php?id=<?php  echo $category['category_id']; ?>" class="btn back_btn">Back</a>
                </div>

            </div>
        </div>
        <?php  }else{ ?>
        <h2>No Product Found</h2>
        <?php  } ?>
    </div>
</div>

<?php  require_once 'footer.php'; ?>