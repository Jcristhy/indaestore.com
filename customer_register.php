<?php 
    $active='Account';
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
                        Register
                    </li>
                </ul>
                <!--BREADCRUMB FINISH-->
            </div>
            <!--COL-MD-12 FINISH-->

            <!--col-md-3 begin-->
            <div class = "col-md-3">

                <?php
                    include("includes/sidebar.php");
                ?>
            </div>
            <!--col-md-3 finish-->

            <!--col-md-9 begin-->
            <div class="col-md-9">
                <!--box begin-->
                <div class="box">
                    <!--box-header begin-->
                    <div class="box-header">
                        <center>
                            <h2>
                                Register a new account
                            </h2>
                        </center>

                        <form action="customer_register.php" method="post" enctype = "multipart/form-data">
                            <!--form-group begin-->
                            <div class="form-group">
                                <label>Full Name</label>

                                <input type="text" class="form-control" name="cust_name" required>
                            </div>
                            <!--form-group finish-->

                            <!--form-group begin-->
                            <div class="form-group">
                                <label>Email</label>

                                <input type="text" class="form-control" name="cust_email" required>
                            </div>
                            <!--form-group finish-->

                            <!--form-group begin-->
                            <div class="form-group">
                                <label>Password</label>

                                <input type="text" class="form-control" name="cust_pass" required>
                            </div>
                            <!--form-group finish-->

                            <!--form-group begin-->
                            <div class="form-group">
                                <label>Country (E.g.: Malaysia)</label>

                                <input type="text" class="form-control" name="cust_country" required>
                            </div>
                            <!--form-group finish-->

                            <!--form-group begin-->
                            <div class="form-group">
                                <label>State (E.g.: Sibu, Kuching)</label>

                                <input type="text" class="form-control" name="cust_city" required>
                            </div>
                            <!--form-group finish-->

                            <!--form-group begin-->
                            <div class="form-group">
                                <label>Contact Number</label>

                                <input type="text" class="form-control" name="cust_contactnum" required>
                            </div>
                            <!--form-group finish-->

                            <!--form-group begin-->
                            <div class="form-group">
                                <label>Home Address</label>

                                <input type="text" class="form-control" name="cust_address" required>
                            </div>
                            <!--form-group finish-->

                            <!--form-group begin-->
                            <div class="form-group">
                                <label>Profile Picture</label>

                                <input type="file" class="form-control form-height-custom" name="cust_image">
                            </div>
                            <!--form-group finish-->

                            <!--text-center begin-->
                            <div class="text-center">
                                <button type="submit" name = "register" class="btn btn-primary">

                                    <i class="fa fa-user"></i> Register

                                </button>
                            </div>
                            <!--text-center finish-->
                        </form>
                    </div>
                    <!--box-header finish-->
                </div>
                <!--box begin-->
            </div>
            <!--col-md-9 finish-->

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

<?php
    if(isset($_POST['register'])){
        $c_name = $_POST['cust_name'];

        $c_email = $_POST['cust_email'];

        $c_pass = $_POST['cust_pass'];

        $c_country = $_POST['cust_country'];

        $c_city = $_POST['cust_city'];

        $c_contactnum = $_POST['cust_contactnum'];

        $c_address = $_POST['cust_address'];

        $c_image = $_FILES['cust_image']['name'];

        $c_image_tmp = $_FILES['cust_image']['tmp_name'];

        $c_ip = getRealIpUser();

        move_uploaded_file($c_image_tmp, "customer/customer_images/$c_image");

        $insert_customer = "insert into customers (cust_name, cust_email, cust_pass, cust_country,
        cust_city, cust_contactnum, cust_address, cust_image, cust_ip)
        values ('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contactnum','$c_address','$c_image','$c_ip')";

        $run_customer = mysqli_query($con, $insert_customer);

        $sel_cart = "select * from cart where ip_add = '$c_ip'";

        $run_cart = mysqli_query($con, $sel_cart);

        $check_cart = mysqli_num_rows($run_cart);

        if($check_cart>0){
            /// IF REGISTER HAVE ITEMS IN THE CART ///

            $_SESSION['cust_email']=$c_email;

            echo "<script> alert('You have been registered successfully') </script>";

            echo "<script> window.open('checkout.php','_self') </script>";
        }
        else{
            /// IF REGISTER WITHOUT ITEM IN THE CART ///

            $_SESSION['cust_email']=$c_email;

            echo "<script> alert('You have been registered successfully') </script>";

            echo "<script> window.open('index.php','_self') </script>";
        }

    }
?>