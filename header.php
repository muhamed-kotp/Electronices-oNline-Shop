<?php  
if(isset($_SESSION['cart'])){
    if( count($_SESSION['cart']) ==0) 
    {
        unset($_SESSION['cart']);
    }
}

require_once 'classes/Categories.php'; 

$cats = new Categories ;
$categories = $cats->getAll()
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/nav.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&family=Sofia+Sans+Extra+Condensed:ital@1&display=swap"
        rel="stylesheet">


</head>

<body>
    <div class="world-wide">WORLDWIDE SHIPPING | 30 DAY FREE RETURNS</div>
    <nav class="navbar navbar-expand-lg navbar-dark  fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="products.php"> <span class="qutp">QUTP</span> <span> <i
                        class="fa-solid fa-truck-fast" style="color: #ffeb14;"></i></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                    <?php if( isset($_SESSION['id']) )  {  ?>

                    <li class="nav-item ">
                        <a class="nav-link active" aria-current="page" href="#"><?php echo $_SESSION['username']  ?></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link active" aria-current="page" href="handlers/handleLogout.php">Logout</a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link active" aria-current="page" href="orders.php">Orders</a>
                    </li>
                    <?php  } ?>

                    <li class="nav-item ">
                        <?php  if(isset($_SESSION['cart'])) { ?>
                        <a class="nav-link active" aria-current="page" href="buy.php">Cart</a>
                    </li>
                    <?php  } ?>


                    <!-- <?php if( ! isset($_SESSION['id']) )  {  ?>
                    <li class="nav-item ">
                        <a class="nav-link active" aria-current="page" href="login.php">Login</a>
                    </li>
                    <?php  } ?> -->
                    <?php if( isset($_SESSION['id']) )  {  ?>
                    <li class="nav-item ">
                        <a class="nav-link active" aria-current="page" href="add.php">Add new</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link active" aria-current="page" href="addCategory.php">Add Category</a>
                    </li>
                    <?php  } ?>

                    <?php if( isset($_SESSION['id']) )  {  ?>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                CATEGORIES
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                <?php 
                             foreach ($categories as $category) { ?>
                                <li><a class="dropdown-item"
                                        href="category.php?id=<?php  echo $category['category_id']; ?>"><?php  echo $category['type']; ?></a>
                                </li>
                                <?php  } ?>
                            </ul>
                        </li>
                    </ul>
                    <?php  } ?>

                    <?php if(! isset($_SESSION['id']) )  {  ?>
                    <?php foreach ($categories as $category) { ?>
                    <li class="nav-item ">
                        <a class="nav-link active" aria-current="page"
                            href="category.php?id=<?php  echo $category['category_id']; ?>"><?php  echo $category['type']; ?></a>
                    </li>
                    <?php  } ?>
                    <?php  } ?>
                    <?php if( isset($_SESSION['id']) )  {  ?>
                    <li class="nav-item ">
                        <a class="nav-link active" aria-current="page" href="products.php">PRODUCTS</a>
                    </li>
                    <?php  } ?>
                    <li class="nav-item ">
                        <a class="nav-link active" aria-current="page" href="index.php">HOME</a>
                    </li>
            </div>
        </div>
    </nav>