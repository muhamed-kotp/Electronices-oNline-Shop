<?php  
session_start();

if( isset($_SESSION['id']) ){
    header('location: products.php');
}

require_once 'classes/Admins.php' ;
require_once 'header.php';




?>


<div class="container " style="margin-top:150px ; margin-bottom:250px">
    <?php  if (isset($_SESSION['errors'] )) {?>
    <div class="container w-50 alert alert-danger">
        <?php  foreach ($_SESSION['errors'] as $error) { ?>
        <p class="text-center mb-0"> <?php echo $error ?> </p>
        <?php  } ?>
    </div>
    <?php  } ?>
    <?php  unset($_SESSION['errors'] ); ?>

    <form method="post" action="handlers/handleBuy.php">
        <div class="row mb-3">
            <label for="customerName" class="col-sm-2 col-form-label"> User name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="customerName" name="customerName">
            </div>
        </div>
        <div class="row mb-3">
            <label for="customerEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="customerEmail" name="customerEmail">
            </div>
        </div>
        <div class="row mb-3">
            <label for="customerPhone" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="customerPhone" name="customerPhone">
            </div>
        </div>
        <div class="row mb-5">
            <label for="customerAddress" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="customerAddress" name="customerAddress">
            </div>
        </div>

        <div class="container d-flex justify-content-center">
            <button type="submit" class="btn VIEW_btn" name="submit">Check Out</button>
        </div>
    </form>
    <div class="d-flex justify-content-center">
        <a href="buy.php" class="btn back_btn">Back</a>
    </div>
</div>

<?php  require_once 'footer.php'; ?>