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
                <?php
                    if(!isset($_SESSION['cust_email'])){
                        include("customer/customer_login.php");
                    }
                    else{
                        include("payment_options.php");
                    }
                ?>
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