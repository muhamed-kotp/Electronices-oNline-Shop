<?php  
require_once 'classes/Categories.php'; 

$cats = new Categories ;
$categories = $cats->getAll()
 ?>
<footer class="site-footer">
    <div class="container">
        <div class="footer-nav-title-cont">
            <a class="footer-nav-title nav-title navbar-brand" href="#">QUTP</a>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h6>About</h6>
                <p class="text-justify">These pieces are sourced with love and so We hope you love them too. The
                    majority of pieces are all one of a kind, making the special piece you purchase a bespoke item. With
                    earrings and chunky necklaces being my favorite to design, We will endeavor to bring you new regular
                    designs. Enjoy and love your new creation and thank you for supporting a local Italian small
                    business.
                    .</p>
            </div>

            <div class="col-xs-6 col-md-3">
                <h6>Categories</h6>
                <ul class="footer-links">
                    <?php  foreach( $categories as $cat ){ ?>
                    <li><a href="category.php?id=<?php  echo $cat['category_id']; ?>"><?php echo $cat['type']   ?></a>
                    </li>
                    <?php  } ?>
                </ul>
            </div>

            <div class="col-xs-6 col-md-3">
                <h6>Quick Links</h6>
                <ul class="footer-links">
                    <li><a href="">About Us</a></li>
                    <li><a href="">Contact Us</a></li>
                    <li><a href="">Contribute</a></li>
                    <li><a href="">Privacy Policy</a></li>
                    <li><a href="">Sitemap</a></li>
                </ul>
            </div>
        </div>
        <hr>
    </div>
    <div class="container">
        <div class="row" style="background-color: black;">
            <div class="col-md-8 col-sm-6 col-xs-12">
                <p class="copyright-text">Copyright &copy; 2023 Nast. All rights reserved. Use of this site constitutes
                    acceptance of our User Agreement and Privacy Policy and Cookie Statement and Your California Privacy
                    Rights. WoW may earn a portion of sales from products that are purchased through our site as part of
                    our Affiliate Partnerships with retailers. The material on this site may not be reproduced,
                    distributed, transmitted, cached or otherwise used, except with the prior written permission of
                    Condé Nast
                    <a href="#">MOHAMED QUTP</a>.
                </p>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <ul class="social-icons">
                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                    <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>






<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
</script>
<script src="https://kit.fontawesome.com/d415d83558.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>

</html>