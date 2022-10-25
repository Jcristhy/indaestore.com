<?php
    $active='Shop';
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

            <!--col-md 9 begin-->
            <div class = "col-md-9">
                <?php
                    if(!isset($_GET['product_cat'])){

                        if(!isset($_GET['cat'])){
                            
                            echo "
                                <!--box begin-->
                                    <div class = 'box'>
                                        <h1> Shop </h1>

                                        <p>
                                            Welcome to IND.A STORE ! <br>
                                            We provide varities of accessories and clothes for your OOTD !
                                            Enjoy buying with us :)
                                        </p>
                                    </div>
                                <!--box finish-->
                            ";
                        }
                       
                    }
                ?>

                <!--row begin-->
                <div class = "row">
                    <?php
                        if(!isset($_GET['product_cat'])){
                            if(!isset($_GET['cat'])){
                                $per_page=6;

                                if(isset($_GET['page'])){
                                    $page=$_GET['page'];

                                    }else{
                                        $page = 1;
                                    }
                                    $start_from = ($page-1) * $per_page;

                                    $get_products = "select * from products order by 1 DESC LIMIT $start_from, $per_page";

                                    $run_products = mysqli_query($con, $get_products);

                                    while($row_products=mysqli_fetch_array($run_products)){
                                        $pro_id = $row_products['product_id'];

                                        $pro_title = $row_products['product_title'];

                                        $pro_price = $row_products['product_price'];

                                        $pro_img1 = $row_products['product_img1'];

                                        echo "
                                            <div class = 'col-md-4 col-sm-6 center-responsive'>
                                                <div class = 'product'>
                                                    <a href = 'details.php?pro_id=$pro_id'>
                                                        <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                                                    </a>

                                                    <div class = 'text'>
                                                        <h3>
                                                            <a href = 'details.php?pro_id=$pro_id'> $pro_title </a>
                                                        </h3>

                                                        <p class = 'price'>
                                                            RM $pro_price
                                                        </p>

                                                        <p class = 'button'>
                                                            <a class='btn btn-default' href = 'details.php?pro_id=$pro_id'>
                                                                View Details
                                                            </a>

                                                            <a class='btn btn-primary' href = 'details.php?pro_id=$pro_id'>
                                                                <i class='fa fa-shopping-cart'></i> Add to Cart
                                                            </a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        ";

                                }
                    ?>
                </div>
                <!--row finish-->

                <!--PAGINATION BEGIN-->
                <center>
                    <ul class = "pagination">
                    <?php
                        $query = "select * from products";

                        $result = mysqli_query($con, $query);

                        $total_records = mysqli_num_rows($result);

                        $total_pages = ceil($total_records / $per_page);
                        
                        echo "
                            <li>
                                <a href = 'shop.php?page=1'> ".'First Page'." </a>
                            </li>
                        ";

                        for($i=1; $i<=$total_pages; $i++){
                            echo "
                                <li>
                                    <a href = 'shop.php?page=".$i."'> ".$i." </a>
                                </li>
                            ";
                        };

                        echo "
                            <li>
                                <a href = 'shop.php?page=$total_pages'> ".'Last Page'." </a>
                            </li>
                        ";
                            }
                        }
                    ?>
                    </ul>
                </center>
                <!--PAGINATION FINISH-->

                <?php
                    getproductcatprofile();

                    getcatprofile();
                ?> 
            </div>
            <!--col-md 9 finish-->
        </div>
        <!--CONTAINER FINISH-->
    </div>
    <!--CONTENT FINISH-->

    <!--FOOTER BEGIN-->
    <?php
        include("includes/footer.php");
    ?>
    <!--FOOTER FINISH-->

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->

</body>
</html>