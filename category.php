<?php  
session_start();

require_once 'header.php';
require_once 'classes/Products.php'; 
require_once 'classes/Categories.php'; 
require_once 'classes/helpers/Str.php' ;

use Classes\Helpers\Str ;
$allData = new Products ;
$products = $allData->getAll() ;
$catID =  $_GET['id'] ;
$cat = new Categories ;
$category = $cat->getOne($catID) ;
// echo $_GET['id'] ;
?>

<div class="Category_Title"><?php  echo $category['type'] ?></div>
<div style="margin-bottom: 250px;">
    <div class="row mx-3" style=" grid-column-gap: 20px; justify-content: center;">
        <?php if( count($products)>0) {  ?>
        <?php  foreach ($products as $product) { 
            if( $product['category_id']==$catID)
            {?>
        <!-- 
        <div class="col-sm-12 col-lg-4 mb-3 prod-col-cont">
            <div class="card border-0 prod-img" style="height: 650px;overflow:hidden important;">

                <a href="show.php?id=<?php  echo $product['id']; ?>" class="">
                    <img style="height:100% ;" src="images/<?php echo $product['img'] ;?>" class="card-img-top"
                        alt="This Image Is Not Avaialble righ now">
                </a>

                <div class="card-body" style="height:200px ;padding: 0;">
                    <h5 class="card-title prod-name fw-normal"><?php  echo $product['name']; ?></h5>
                    <h5 class="card-title prod-price"> <span class="fw-lighter fs-5">$
                        </span><?php echo $product['price']; ?>
                    </h5>
                    <?php if( isset($_SESSION['id']) )  {  ?>
                    <a href="edit.php?id=<?php  echo $product['id']; ?>" class="btn btn-info">Edit</a>
                    <a href="handlers/handleDelete.php?id=<?php  echo $product['id']; ?>"
                        class="btn btn-danger">delete</a>
                    <?php  } ?>
                </div>
            </div>
        </div> -->

        <div class=" mb-3 prod-col-cont ">
            <div style="height:80%; overflow:hidden">
                <a href="show.php?id=<?php  echo $product['id']; ?>">
                    <div class="card prod-img " style="background-image: url('images/<?php echo $product['img'] ;?>')">
                    </div>
                </a>
            </div>
            <div class="card-body" style="height:300px ;padding: 0; ">
                <h5 class="card-title prod-name fw-normal"><?php  echo $product['name']; ?></h5>
                <h5 class="card-title prod-price"> <span class="fw-lighter fs-5">$
                    </span><?php echo $product['price']; ?>
                </h5>
                <?php if( isset($_SESSION['id']) )  {  ?>
                <a href="edit.php?id=<?php  echo $product['id']; ?>" class="btn btn-info">Edit</a>
                <a href="handlers/handleDelete.php?id=<?php  echo $product['id']; ?>" class="btn btn-danger">delete</a>
                <?php  } ?>
            </div>
        </div>

        <?php  } ?>
        <?php  } ?>
        <?php  }else{
            echo"there is no products" ;
        } ?>
    </div>
</div>
<?php  require_once 'footer.php'; ?>