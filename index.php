<?php
include "header.php";
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"maniexpress"); 

?>
<!-- slidder -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="banner1.webp" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="banner2.webp" alt="Second slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- About -->
<div class="container-fluid bg-lights">
    <div class="container">
        <h2 class="text-center py-5 underline-small">About Us</h2>
        <div class="row">
            <div class="col-md-6">
                <img src="about.jpg" class="img-fluid">
            </div>
            <div class="col-md-6">
                <p>
                    Since 1942 <b>Mani Express</b> has been rendering its services to its valued customers by offering quality products.<br><br>
                    It was incorporated in Pakistan as Bata Shoe Company (Pakistan) Limited in 1951 and went public to become Bata Pakistan Limited in the year 1979.<br><br>
                    Since its inception, the company has not only maintained a good reputation of manufacturing high quality footwear for all segments but has also been designing shoes in accordance with the changing fashions and trends.<br><br>
                    If you encounter any problem with our product, please refer to the store of purchase with the original cash memo. The store manager would be able to assist you.<br><br>
                    Bata Pakistan is serving its valued customers through a strong retail network comprising of more than 431 retail outlets, 544 registered wholesale dealers and 136 DSP franchise served by 12 wholesale depots across the country.<br><br>
                    Besides catering local market, Bata Pakistan also shows its presence in an international footwear market through its export department which is constantly exploring new potential market in order to earn foreign exchange.
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Products -->
<div>
    <div class="container pt-5">
        <h2 class="text-center py-5 underline-small">Products</h2>



        <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link linkcolor active" id="men-tab" data-toggle="tab" href="#men" role="tab" aria-controls="men" aria-selected="true">Men</a>
            </li>
            <li class="nav-item">
                <a class="nav-link linkcolor" id="women-tab" data-toggle="tab" href="#women" role="tab" aria-controls="women" aria-selected="false">Women</a>
            </li>
            <li class="nav-item">
                <a class="nav-link linkcolor" id="kid-tab" data-toggle="tab" href="#kid" role="tab" aria-controls="kid" aria-selected="false">Kids</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="men" role="tabpanel" aria-labelledby="men-tab">            
                <div class="container">
                    <div class="row pb-5">

                        <?php
                        $res=mysqli_query($link,"select * from product where product_category='men'");
                        while($row=mysqli_fetch_array($res)){
                            ?>
                            <div class="col-md-4 p-4 bg-light text-center">
                                <img src="<?php echo $row["product_image"]; ?>" class="img-fluid" style="height: 200px;width: auto;">
                                <h4 class="pt-3"><?php echo $row["product_name"]; ?></h4>
                                <p class="text-secondary"><?php echo $row["product_price"]; ?></p>
                                <a href="product_details.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger" type="button">
                                    View Details
                                </a>
                            </div>

                            <?php

                        }
                        ?>   
                        
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="women" role="tabpanel" aria-labelledby="women-tab">
                <div class="container">
                    <div class="row pb-5">

                        <?php
                        $res=mysqli_query($link,"select * from product where product_category='women'");
                        while($row=mysqli_fetch_array($res)){
                            ?>
                            <div class="col-md-4 p-4 bg-light text-center">
                                <img src="<?php echo $row["product_image"]; ?>" class="img-fluid" style="height: 200px;width: auto;">
                                <h4 class="pt-3"><?php echo $row["product_name"]; ?></h4>
                                <p class="text-secondary"><?php echo $row["product_price"]; ?></p>
                                <a href="product_details.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger" type="button">
                                    View Details
                                </a>
                            </div>

                            <?php

                        }
                        ?>   
                        
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="kid" role="tabpanel" aria-labelledby="kid-tab">
                <div class="container">
                    <div class="row pb-5">

                        <?php
                        $res=mysqli_query($link,"select * from product where product_category='kids'");
                        while($row=mysqli_fetch_array($res)){
                            ?>
                            <div class="col-md-4 p-4 bg-light text-center">
                                <img src="<?php echo $row["product_image"]; ?>" class="img-fluid" style="height: 200px;width: auto;">
                                <h4 class="pt-3"><?php echo $row["product_name"]; ?></h4>
                                <p class="text-secondary"><?php echo $row["product_price"]; ?></p>
                                <a href="product_details.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger" type="button">
                                    View Details
                                </a>
                            </div>

                            <?php

                        }
                        ?>   
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- SHOP WITH US -->
<div class="container-fluid bg-light">
    <h2 class="text-center pt-5">Why Shop With Us</h2>
    <div class="container text-center">
        <div class="row py-5">
            <div class="col-md-4 bg-white py-5">
                <i class="fa fa-truck text-danger icon" style="font-size: 60px"></i>
                <h4 class="pt-4 pb-1">New Arrivals</h4>
                <p class="text-secondary">Every Friday New Lines</p>
            </div>
            <div class="col-md-4 bg-white py-5">
                <i class="fa fa-archive icon text-danger icon" style="font-size: 60px"></i>
                <h4 class="pt-4 pb-1">Click & Collect</h4>
                <p class="text-secondary">Deliver to any Bata Store or Your Address</p>
            </div>
            <div class="col-md-4 bg-white py-5">
                <i class="fa fa-cart-arrow-down text-danger icon" style="font-size: 60px"></i>
                <h4 class="pt-4 pb-1">Speedy Delivery</h4>
                <p class="text-secondary">2-5 Working Days</p>
            </div>
        </div>
    </div>
</div>
<!-- Contact -->
<div class="container">
    <h2 class="text-center pt-4 underline-small">Contact</h2>
    <div class="row">
        <div class="col-md-6">
            <img src="contact.jpg" class="img-fluid">
        </div>
        <div class="col-md-6 pt-4">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 item pt-4 mt-4 bg-light">
                        <h4><i class="fa fa-envelope-o mr-3"></i>Email</h4>
                        <p>You can clear you all kind of queries by sending us email at:<br>Uusman004@gmail.com</p>
                    </div>
                    <div class="col-sm-12 item pt-4 mt-4 bg-light">
                        <h4><i class="fa fa-phone mr-3"></i>Phone</h4>
                        <p>We provide 24/7 customer care service, you can contact us at:<br>+92 310 2257759</p>
                    </div>
                    <div class="col-sm-12 item pt-4 mt-4 bg-light">
                        <h4><i class="fa fa-map-marker mr-3"></i>Address</h4>
                        <p>You can approach us at:<br>House # K-14 32 S-42, Street # 09 , Near Sabri Masjid ,Gulistan Colony<br>Lyari, Karachi, Pakistan. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Contact -->
<!-- subscription -->
<div class="newsletter-subscribe py-5">
    <div class="container">
        <div class="intro">
            <h2 class="text-center">Signup for Email Updates</h2>
            <p class="text-center text-secondary">Sign Up to get updates about our latest upcoming collections. </p>
        </div>
        <form class="form-inline" method="post">
            <div class="form-group"><input class="form-control rounded bg-light" type="email" name="email" placeholder="Your Email"></div>
            <div class="form-group"><button class="btn btn-danger p-2" type="submit">Subscribe </button>
            </div>
        </form>
    </div>
</div>
<!-- companyicons -->
<div class="container-fluid bg-light text-center text-secondary">
    <div class="row">
        <div class="col-md-2 py-5">
            <i class="fa fa-wordpress" style="font-size: 60px"></i>
        </div>
        <div class="col-md-2 py-5">
            <i class="fa fa-paypal" style="font-size: 60px"></i>
        </div>
        <div class="col-md-2 py-5">
            <i class="fa fa-instagram" style="font-size: 60px"></i>
        </div>
        <div class="col-md-2 py-5">
            <i class="fa fa-amazon" style="font-size: 60px"></i>
        </div>
        <div class="col-md-2 py-5">
            <i class="fa fa-bank" style="font-size: 60px"></i>
        </div>
        <div class="col-md-2 py-5">
            <i class="fa fa-google" style="font-size: 60px"></i>
        </div>
    </div>
</div>
<?php
include "footer.php"
?>