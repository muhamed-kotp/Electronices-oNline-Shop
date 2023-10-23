<?php  
session_start();

require_once 'header.php';
require_once 'classes/Categories.php'; 

$cats = new Categories ;
$categories = $cats->getAll()
?>



<div id="carouselExampleInterval" class="carousel slide mb-3 " data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="4000">
            <img style="height:600px ;" src="images/pexels-picjumbocom-196658.jpg" class="d-block w-100 " alt="...">
        </div>
        <div class="carousel-item" data-bs-interval="4000">
            <img style="height:600px ;" src="images/pexels-pixabay-356056.jpg" class="d-block w-100" alt="...">
        </div>


    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="row mx-3 mb-5" style=" grid-column-gap: 20px;box-sizing: border-box;">
    <?php if( count($categories)>0) {  ?>
    <?php  foreach ($categories as $category) { ?>
    <div class="col-sm-12 col-lg-6 mb-3 cat-col-cont ">
        <div class="card cat_img " style="background-image: url('images/<?php echo $category['img'] ;?>')">>
            <div class="card-body d-flex justify-content-center align-items-center flex-column w-100">
                <h3 class="cat-type"><?php echo $category['type'] ;?></h3>
                <a class="btn  VIEW_btn" href="category.php?id=<?php  echo $category['category_id']; ?>">VIEW
                    PRODUCTS</a>
            </div>
        </div>
    </div>
    <?php  } ?>
    <?php  }else{
            echo"there is no products" ;
        } ?>
</div>

<div class="join-conT">
    <h5 class="join">JOIN US TO GET 20% OFF ON YOUR FIRTS ORDER </h5>
</div>

<div class=" container">

    <div class=" trdBox-FRS-title">
        <div class="popular-cont">
            <p class="popular Products-p">New Products</p>
        </div>
        <div class="load Product-logo">
            <div class="one"></div>
            <div class="two"></div>
            <div class="three"></div>
        </div>

    </div>
    <div class="pop-hr new_product-line">
        <hr class="pop-line " />
    </div>
</div>


<div class="container " style="margin-bottom :250px; ">
    <div class=" row ">
        <div class="mt-5 col-lg-6">
            <div class="ms-5">
                <h4 class="fw-bold">Apple core I7</h4>
                <h4 class="fw-light"> <span class="fw-lighter fs-6">$</span>15000</h4>
                <p> This one is the best seller in 2023 , it will help you to work, study, or browse the internet
                    virtually anywhere, whether on your couch, in
                    a coffee shop, or on a plane. You can put it on a study table or your lap; there's no need to find a
                    proper space for this device.
                </p>
                <p>
                    <span class="fw-bold">More services</span> - This computer can be used to ‘repackage’
                    information held on a database, in the form of
                    directories, resource lists or current awareness bulletins. Information held on the computer or
                    available via the Internet can be adapted to produce locally relevant materials.
                </p>
            </div>
        </div>
        <div class="col-lg-6 mt-5">
            <img src="images/6534652071294.jpg" class="img-fluid ">
        </div>

    </div>
</div>



<?php  require_once 'footer.php'; ?>