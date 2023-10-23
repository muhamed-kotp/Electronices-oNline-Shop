<?php  
session_start();

if( ! isset($_SESSION['id']) ){
    header('location: login.php');
}

require_once 'classes/Categories.php' ;
require_once 'header.php';

?>

<div class="container  " style="margin-top: 6rem;margin-bottom: 280px;">
    <?php  if (isset($_SESSION['errors'] )) {?>
    <div class="container w-50 alert alert-danger">
        <?php  foreach ($_SESSION['errors'] as $error) { ?>
        <p class="text-center mb-0"> <?php echo $error ?> </p>
        <?php  } ?>
    </div>
    <?php  } ?>
    <?php  unset($_SESSION['errors'] ); ?>
    <form method="post" action="handlers/handleAddCategory.php" enctype="multipart/form-data">

        <div class="row mb-3">

            <label for="CategoryType" class="col-sm-2 col-form-label">Category Type</label>
            <div class="col-sm-10 mb-5">
                <input type="text" class="form-control" id="CategoryType" name="type">
            </div>
            <label for="formFileMultiple" class="col-sm-2 col-form-label ">Choose Images</label>
            <div class="col-sm-10 ">
                <input class="form-control" type="file" id="formFileMultiple" name="img">
            </div>
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>

<?php  require_once 'footer.php'; ?>