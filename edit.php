<?php  
session_start();

if( ! isset($_SESSION['id']) ){
    header('location: login.php');
}
require_once 'classes/Products.php' ;
require_once 'header.php';

$ids = $_GET['id'] ;
$allData = new Products ;
$product = $allData->getOne($ids);
?>

<div class="container  my-5">
    <?php  if (isset($_SESSION['errors'] )) {?>
    <div class="container w-50 alert alert-danger">
        <?php  foreach ($_SESSION['errors'] as $error) { ?>
        <p class="text-center mb-0"> <?php echo $error ?> </p>
        <?php  } ?>
    </div>
    <?php  } ?>
    <?php  unset($_SESSION['errors'] ); ?>
    <form method="post" action="handlers/handleEdit.php?id=<?php  echo $ids ; ?> " enctype="multipart/form-data">
        <div class="row mb-3">
            <label for="ProductName" class="col-sm-2 col-form-label">Product Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="ProductName" name="name"
                    value="<?php echo $product['name']  ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="ProductPrice" class="col-sm-2 col-form-label">Product Price</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="ProductPrice" name="price"
                    value="<?php echo $product['price']  ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="ProductQuantity" class="col-sm-2 col-form-label">Product Quantity</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="ProductQuantity" name="quantity"
                    value="<?php echo $product['quantity']  ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="ProductCategory" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="ProductCategory" name="category_id"
                    value="<?php echo $product['category_id']  ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Product Discription</label>
            <div class="col-sm-10">
                <textarea class="  form-control" id="exampleFormControlTextarea1" rows="3"
                    name="desc"><?php echo $product['desc']  ?></textarea>
            </div>
        </div>
        <div class="row mb-5">
            <label for="formFileMultiple" class="col-sm-2 col-form-label">Choose Images</label>
            <div class="col-sm-10">
                <input class="form-control" type="file" id="formFileMultiple" name="img">
            </div>
        </div>
        <button type="submit" class="btn btn-primary" name="submit" value="Edit">Submit</button>
    </form>
</div>



<?php  require_once 'footer.php'; ?>