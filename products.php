<?php  
session_start();

require_once 'header.php';
require_once 'classes/Products.php'; 
require_once 'classes/helpers/Str.php' ;

use Classes\Helpers\Str ;
$allData = new Products ;
$products = $allData->getAll()

?>

<div style="margin-top:150px ;margin-bottom: 250px;" class="container ">
    <div class="row ">
        <?php if( count($products)>0) {  ?>
        <?php  foreach ($products as $product) { ?>
        <div class="col-lg-4 mb-3">
            <div class="card">
                <img src="images/<?php echo $product['img'] ;?>" class="card-img-top"
                    alt="This Image Is Not Avaialble righ now">
                <div class="card-body">
                    <h4 class="card-title fw-normal"><?php  echo $product['name']; ?></h4>
                    <h3 class="card-title fw-bolder"> <span class="fw-lighter fs-5">$
                        </span><?php echo $product['price']; ?>
                    </h3>
                    <p class="card-text"><?php  echo Str::limit($product['desc']) ?></p>
                    <a href="show.php?id=<?php  echo $product['id']; ?>" class="btn btn-primary">Show</a>

                    <?php if( isset($_SESSION['id']) )  {  ?>
                    <a href="edit.php?id=<?php  echo $product['id']; ?>" class="btn btn-info">Edit</a>
                    <a href="handlers/handleDelete.php?id=<?php  echo $product['id']; ?>"
                        class="btn btn-danger">delete</a>
                    <?php  } ?>
                </div>
            </div>
        </div>
        <?php  } ?>
        <?php  }else{
            echo"there is no products" ;
        } ?>
    </div>
</div>
<?php  require_once 'footer.php'; ?>