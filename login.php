<?php  
session_start();

if( isset($_SESSION['id']) ){
    header('location: products.php');
}

require_once 'classes/Admins.php' ;
require_once 'header.php';




?>

<div style="margin-top:150px ; margin-bottom:250px" class="container w-50   ">
    <?php  if (isset($_SESSION['errors'] )) {?>
    <div class="container w-50 alert alert-danger">
        <?php  foreach ($_SESSION['errors'] as $error) { ?>
        <p class="text-center mb-0"> <?php echo $error ?> </p>
        <?php  } ?>
    </div>
    <?php  } ?>
    <?php  unset($_SESSION['errors'] ); ?>

    <form method="post" action="handlers/handleLogin.php">
        <div class="row mb-3">
            <label for="emaill" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="emaill" name="email">
            </div>
        </div>
        <div class="row mb-3">
            <label for="passwordd" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="passwordd" name="password">
            </div>
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>

<?php  require_once 'footer.php'; ?>