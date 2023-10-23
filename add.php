<?php  
session_start();

if( ! isset($_SESSION['id']) ){
    header('location: login.php');
}

require_once 'classes/Products.php' ;
require_once 'header.php';




?>

<div class="container  mt-5" style="margin-bottom: 250px;">
    <?php  if (isset($_SESSION['errors'] )) {?>
    <div class="container w-50 alert alert-danger">
        <?php  foreach ($_SESSION['errors'] as $error) { ?>
        <p class="text-center mb-0"> <?php echo $error ?> </p>
        <?php  } ?>
    </div>
    <?php  } ?>
    <?php  unset($_SESSION['errors'] ); ?>
    <form method="post" action="handlers/handleAdd.php" enctype="multipart/form-data">
        <div class="row mb-3">
            <label for="ProductName" class="col-sm-2 col-form-label">Product Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="ProductName" name="name">
            </div>
        </div>
        <div class="row mb-3">
            <label for="ProductPrice" class="col-sm-2 col-form-label">Product Price</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="ProductPrice" name="price">
            </div>
        </div>
        <div class="row mb-3">
            <label for="ProductQuantity" class="col-sm-2 col-form-label">Product Quantity</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="ProductQuantity" name="quantity">
            </div>
        </div>
        <div class="row mb-3">
            <label for="ProductCategory" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="ProductCategory" name="category_id">
            </div>
        </div>
        <div class="row mb-3">
            <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Product Discription</label>
            <div class="col-sm-10">
                <textarea class="  form-control" id="exampleFormControlTextarea1" rows="3" name="desc"></textarea>
            </div>
        </div>
        <div class="row mb-5">
            <label for="formFileMultiple" class="col-sm-2 col-form-label">Choose Images</label>
            <div class="col-sm-10">
                <input class="form-control" type="file" id="formFileMultiple" name="img" multiple>
            </div>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>

<?php  require_once 'footer.php'; ?>