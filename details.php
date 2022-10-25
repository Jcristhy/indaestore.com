<?php
    $active='Cart';
    include("includes/header.php");
?>

    <!--CONTENT BEGIN-->
    <div id = "content">
        <!--CONTAINER BEGIN-->
        <div class = "container">
            <!--COL-MD-12 BEGIN-->
            <div class = "col-md-12">
                <!--BREADCRUMB BEGIN-->
                <ul class="breadcrumb">
                    <li>
                        <a href="index.php">Home</a>
                    </li>

                    <li>
                        Shop
                    </li>

                    <li>
                        <a href="shop.php?product_cat=<?php echo $pro_cat_id; ?>"><?php echo $pro_cat_title; ?></a>
                    </li>

                    <li>
                        <?php echo $pro_title; ?>
                    </li>
                </ul>
                <!--BREADCRUMB FINISH-->
            </div>

            <!--col-md-3 begin-->
            <div class = "col-md-3">
                <?php
                    include("includes/sidebar.php");
                ?>
            </div>
            <!--col-md-3 finish-->

            <!--col-md-9 begin-->
            <div class="col-md-9">
                <!--productMain begin-->
                <div id="productMain" class="row">
                    <!--col-sm 6 begin-->
                    <div class="col-sm-6">
                        <!--mainImage begin-->
                        <div id="mainImage">
                            <!--myCarousel begin-->
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators"> <!--small dotted in product image-->
                                    <li data-target="#myCarousel" data-slide-to = "0" class = "active"></li>
                                    <li data-target="#myCarousel" data-slide-to = "1"></li>
                                    <li data-target="#myCarousel" data-slide-to = "2"></li>
                                </ol>

                                <!--carousel-inner begin-->
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <center><img class = "img-responsive" src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="Product 1-a"></center>
                                    </div>
                                    <div class="item">
                                        <center><img class = "img-responsive" src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="Product 1-b"></center>
                                    </div>
                                    <div class="item">
                                        <center><img class = "img-responsive" src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="Product 1-c"></center>
                                    </div>
                                </div>
                                <!--carousel-inner finish-->

                                <!--left carousel-control begin-->
                                <a href="#myCarousel" class="left carousel-control" data-slide = "prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <!--left carousel-control finish-->

                                <!--right carousel-control begin-->
                                <a href="#myCarousel" class="right carousel-control" data-slide = "next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <!--right carousel-control finish-->

                            </div>
                            <!--myCarousel finish-->
                        </div>
                        <!--mainImage finish-->
                    </div>
                    <!--col-sm 6 finish-->

                    <!--col-sm 6 begin-->
                    <div class="col-sm-6">
                        <!--box begin-->
                        <div class="box">
                            <h1 class="text-center"> <?php echo $pro_title; ?> </h1>

                            <?php add_cart();?>

                            <!--form-horizontal begin-->
                            <form action="details.php?add_cart=<?php echo $product_id;?>" class="form-horizontal" method = "post">
                            <!--QUANTITY-->    
                            <!--form-group begin-->
                                <div class="form-group">
                                    <label for="" class="col-md-5 control-label">Product Quantity</label>

                                    <!--col-md-7 begin-->
                                    <div class="col-md-7">
                                        <select name="product_qty" id="" class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <!--col-md-7 finish-->
                                </div>
                                <!--form-group finish-->

                                <!--SIZE-->
                                <!--form-group begin-->
                                <div class="form-group">
                                    <label class="col-md-5 control-label">Product Size [Applicable on clothes only]</label>

                                    <!--col-md-7 begin-->
                                    <div class="col-md-7">
                                        <select name="product_size" class="form-control" required oninput="setCustomValidity('')"
                                        oninvalid="setCustomValidity('Must pick 1 size for the product')">
                                            <option disabled selected>Select a size</option>
                                            <option>Small</option>
                                            <option>Medium</option>
                                            <option>Large</option>
                                            <option>Extra Large</option>
                                        </select>
                                    </div>
                                    <!--col-md-7 finish-->
                                </div>
                                <!--form-group finish--> <!--[SIZE TUKAR KPD TYPE]-->

                                <!--PRICE-->
                                <!--form-group begin-->
                                <div class="form-group">
                                    <!--PRODUCT PRICE NEED TO EDIT DESIGN-->
                                    <label class="col-md-5 control-label">Price</label>

                                    <!--col-md-7 begin-->
                                    <div class="col-md-6">
                                        <p class="price">RM  <?php echo $pro_price; ?></p>
                                    </div>
                                    <!--col-md-7 finish-->
                                </div>
                                <!--form-group finish-->

                                <!--ADD TO CART BUTTON-->
                                <p class="text-center buttons"><button class="btn btn-primary i fa fa-shopping-cart"> Add to cart</button></p>
                            </form>
                            <!--form-horizontal begin-->
                        </div>
                        <!--box finish-->

                        <!--PRODUCT IMAGE CAROUSEL-->
                        <!--row begin-->
                        <div class="row" id="thumbs">
                            <!--col-xs-4 begin-->
                            <div class="col-xs-4">
                                <a data-target="#myCarousel" data-slide-to = "0" href="#" class="thumb">
                                    <img src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="product 1" class="img-responsive">
                                </a>
                            </div>
                            <!--col-xs-4 finish-->

                            <!--col-xs-4 begin-->
                            <div class="col-xs-4">
                                <a data-target="#myCarousel" data-slide-to = "1" href="#" class="thumb">
                                    <img src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="product 2" class="img-responsive">
                                </a>
                            </div>
                            <!--col-xs-4 finish-->

                            <!--col-xs-4 begin-->
                            <div class="col-xs-4">
                                <a data-target="#myCarousel" data-slide-to = "2" href="#" class="thumb">
                                    <img src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="product 3" class="img-responsive">
                                </a>
                            </div>
                            <!--col-xs-4 finish-->
                            
                        </div>
                        <!--row finish-->
                    </div>
                    <!--col-sm 6 finish-->

                </div>
                <!--productMain finish-->

                <!--PRODUCT DESCRIPTION BOX-->
                <!--box begin-->
                <div class="box" id="details">
                
                    <h4>Product Detail</h4>

                    <p>
                        <?php echo $pro_desc; ?>
                    </p>

                </div>
                <!--box finish--> <!--PRODUCT DESCRIPTION BOX-->

                <!--PRODUCT SUGGESTION BOX-->
                <!--row same-height-row begin-->
                <div id="row same-height-row">
                    <!--col-md-3 col-sm-6 begin-->
                    <div class="col-md-3 col-sm-6">
                        <!--box same-height headline begin-->
                        <div class="box same-height headline">
                            <h3 class="text-center">Products You May Like</h3>
                        </div>
                        <!--box same-height headline finish-->
                    </div>
                    <!--col-md-3 col-sm-6 finish-->

                    <?php
                        $get_products = "select * from products order by rand() LIMIT 0,3";

                        $run_products = mysqli_query($con, $get_products);

                        while($row_products = mysqli_fetch_array($run_products)){
                            $pro_id = $row_products['product_id'];

                            $pro_title = $row_products['product_title'];

                            $pro_img1 = $row_products['product_img1'];

                            $pro_price = $row_products['product_price'];

                            echo "
                                <div class = 'col-md-3 col-sm-6 center-responsive'>
                                    <div class = 'product same-height'>
                                        <a href = 'details.php?pro_id=$pro_id'>
                                            <img class = 'img-responsive' src='admin_area/product_images/$pro_img1'>
                                        </a>

                                        <div class ='text'>
                                            <h3><a href = 'details.php?pro_id=$pro_id'> $pro_title </a></h3>

                                            <p class = 'price'> RM $pro_price </p>
                                        </div>
                                    </div>
                                </div>
                            ";
                        }
                    ?>
                </div>
                <!--row same-height-row finish--> <!--PRODUCT SUGGESTION BOX-->
            </div>
            <!--col-md-9 finish-->
        </div>
    </div>
    <!--CONTENT FINISH-->

    <!--FOOTER BEGIN-->
    <?php
    include("includes/footer.php");
    ?>
    <!--FOOTER FINISH-->

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>