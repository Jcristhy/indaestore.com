<?php 
    $active='Account';
    include("includes/header.php");
?>

    <!--CONTENT BEGIN-->
    <div id = "content">
        <!--CONTAINER BEGIN-->
        <div class = "container">

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
                                Forget Password?
                            </h2>
                        </center>

                        <!--CHANGE PASSWORD FOR FORGET PASSWORD-->

                        <form action="" METHOD = "post">
                            <!-- FORM-GROUP BEGIN -->
                            <div class="form-group">
                                <label> Your Email </label>

                                <input name="cust_email" type="text" class="form-control" required>
                            </div>
                            <!-- FORM-GROUP FINISH -->

                            <!--form-group begin-->
                            <div class="form-group">
                                <label> New Password</label>

                                <input type="text" class="form-control" name="cust_pass" required>
                            </div>
                            <!--form-group finish-->

                            <!--text-center begin-->
                            <div class="text-center">
                                <button type = "submit" name = "submit" class="btn btn-primary">
                                    <i class="fa fa-unlock-alt"></i> Change Password
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
    if(isset($_POST['submit'])){
        if(mysqli_query($con, "UPDATE customers SET cust_pass='$_POST[cust_pass]'
        WHERE cust_email='$_POST[cust_email]'")){
            ?>
            <script type="text/javascript">
                alert("Password changed successfully, you may re-login now. Thank You")
            </script>
            <?php
        }
    }
?>