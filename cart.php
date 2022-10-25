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
                        Cart
                    </li>
                </ul>
                <!--BREADCRUMB FINISH-->
            </div>
            <!--COL-MD-12 FINISH-->

            <!--SHOPPING CART CONTENT--> <!--col-md-9 begin-->
            <div id="cart" class="col-md-9">
                <!--box begin-->
                <div class="box">
                    <form action = "cart.php" method = "post" enctype = "multipart/form-data">
                        <h1>Shopping Cart</h1>

                        <?php
                            $ip_add = getRealIpUser();

                            $select_cart = "select * from cart where ip_add = '$ip_add'";

                            $run_cart = mysqli_query($con, $select_cart);

                            $count = mysqli_num_rows($run_cart);
                        ?>

                        <p class="text-muted">You currently have <?php echo $count; ?> item(s) in your cart</p>

                        <!--table-responsive begin-->
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan = "2">Product</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Size</th>
                                        <th colspan = "1">Delete</th>
                                        <th colspan = "2">Sub-Total</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $total = 0;

                                        while($row_cart = mysqli_fetch_array($run_cart)){
                                            $pro_id = $row_cart['product_id'];

                                            $pro_size = $row_cart['size'];

                                            $pro_qty = $row_cart['qty'];

                                                $get_products = "select * from products where product_id = '$pro_id'";

                                                $run_products = mysqli_query($con, $get_products);

                                                while($row_products = mysqli_fetch_array($run_products)){
                                                    $product_title = $row_products['product_title'];
                                                    $product_img1 = $row_products['product_img1'];
                                                    $only_price = $row_products['product_price'];
                                                    $sub_total = $row_products['product_price']*$pro_qty;

                                                    $total += $sub_total;
                                            

                                    ?>
                                    <tr>
                                        <td>
                                            <img class = "img-responsive" src="admin_area/product_images/<?php echo $product_img1; ?>" alt="Product 1-a">
                                        </td>

                                        <td>
                                            <a href="details.php?pro_id=<?php echo $pro_id; ?>"> <?php echo $product_title; ?> </a>
                                        </td>

                                        <td>
                                            <?php echo $pro_qty; ?>
                                        </td>

                                        <td>
                                            RM <?php echo $only_price; ?>
                                        </td>

                                        <td>
                                            <?php echo $pro_size; ?>
                                        </td>

                                        <td>
                                            <input type="checkbox" name = "remove[]" value="<?php echo $pro_id; ?>">
                                        </td>

                                        <td>
                                            RM <?php echo $sub_total; ?>
                                        </td>
                                    </tr>

                                    <?php } } ?>
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th colspan = "5">Total</th>
                                        <th colspan = "2">RM <?php echo $total; ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!--table-responsive finish-->

                        <!--box-footer begin-->
                        <div class="box-footer">
                            <!--pull-left begin-->
                            <div class="pull-left">
                                <a href="index.php" class="btn btn-default">
                                    <i class="fa fa-chevron-left"></i> Continue Shopping`
                                </a>
                            </div>
                            <!--pull-left finish-->

                            <!--pull-right begin-->
                            <div class="pull-right">
                                <button type = "submit" name = "update" value = "Update Cart" class="btn btn-default">
                                    <i class="fa fa-refresh"></i> Update Cart
                                </button>

                                <a href="checkout.php" class="btn btn-primary">
                                    Proceed Checkout <i class="fa fa-chevron-right"></i>
                                </a>
                            </div>
                            <!--pull-right finish-->
                        </div>
                        <!--box-footer finish-->
                    </form>
                </div>
                <!--box finish-->
                
                <!--UPDATE CART: DELETE ITEMS IN CART FUNCTION START-->
                <?php
                    function update_cart(){
                        global $con;

                        if(isset($_POST['update'])){
                            foreach($_POST['remove'] as $remove_id){
                                $delete_product = "delete from cart where product_id = '$remove_id'";

                                $run_delete = mysqli_query($con, $delete_product);

                                if($run_delete){
                                    echo "<script>window.open('cart.php', '_self')</script>";
                                }
                            }
                        }
                    }
                    echo @$up_cart = update_cart();
                ?>
                <!--UPDATE CART: DELETE ITEMS IN CART FUNCTION FINISH-->

                <!--row same-height-row begin--> <!--PRODUCT SUGGESTION BOX-->
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

                            $pro_price = $row_products['product_price'];

                            $pro_img1 = $row_products['product_img1'];

                            echo "

                    <!--col-md-3 col-sm-6 center-responsive begin-->
                    <div class='col-md-3 col-sm-6 center-responsive'>
                        <!--product same-height begin-->
                        <div class='product same-height'>
                            <a href='details.php?pro_id=$pro_id'>
                                <img class = 'img-responsive' src='admin_area/product_images/$pro_img1' alt='Product 5'>
                            </a>

                            <!--text begin-->
                            <div class='text'>
                                <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>

                                <p class='price'>RM $pro_price</p>
                            </div>
                            <!--text finish-->

                        </div>
                        <!--product same-height finish-->
                    </div>
                    <!--col-md-3 col-sm-6 center-responsive finish-->

                            ";
                            
                        }

                    ?>
                </div>
                <!--row same-height-row finish--> <!--PRODUCT SUGGESTION BOX-->
            </div>
            <!--col-md-9 FINISH-->

            <!--ORDER SUMMARY BOX--> <!--col-md-3 begin-->
            <div class="col-md-3">
                <!--order-summary begin-->
                <div id="order-summary" class="box">
                    <!--box-header begin-->
                    <div class="box-header">
                        <h3>Order Summary</h3>
                    </div>
                    <!--box-header finish-->

                    <p class="text-muted">
                        Shipping and additional costs are calculated based on value you have entered
                    </p>

                    <!--table-responsive begin-->
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        Order Sub-Total
                                    </td>

                                    <th>
                                        RM <?php echo $total; ?>
                                    </th>
                                </tr>

                                <tr>
                                    <td>
                                        Shipping and Handling
                                    </td>

                                    <td>
                                        RM 0
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        Tax
                                    </td>

                                    <th>
                                        RM 0
                                    </th>
                                </tr>

                                <tr class = "total">
                                    <td>
                                        Total
                                    </td>

                                    <th>
                                        RM<?php echo $total; ?>
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--table-responsive finish-->
                </div>
                <!--order-summary finish-->
            </div>
            <!--col-md-3 finish-->
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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>