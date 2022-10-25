<?php 
    $active='Contact';
    include("includes/header.php");

    include("includes/sendEmail.php");
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
                        Contact Us
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
                                Feel free to Contact Us
                            </h2>

                            <p class="text-muted">
                                If you have any questions, feel free to contact us. Our Customer Service work <strong>24/7</strong>.
                            </p>
                        </center>

                        <?php echo $alert; ?>

                        <form action="contact.php" method="post">
                            <!--form-group begin-->
                            <div class="form-group">
                                <label>Name</label>

                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <!--form-group finish-->

                            <!--form-group begin-->
                            <div class="form-group">
                                <label>Email</label>

                                <input type="text" class="form-control" name="email" required>
                            </div>
                            <!--form-group finish-->

                            <!--form-group begin-->
                            <div class="form-group">
                                <label>Subject</label>

                                <input type="text" class="form-control" name="subject" required>
                            </div>
                            <!--form-group finish-->

                            <!--form-group begin-->
                            <div class="form-group">
                                <label>Message</label>

                                <textarea name="message" class="form-control"></textarea>
                            </div>
                            <!--form-group finish-->

                            <!--text-center begin-->
                            <div class="text-center">
                                <button type="submit" name ="submit" class="btn btn-primary">

                                    <i class="far fa-envelope-open"></i> Send Message

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

    <script type="text/javascript">
        if(window.history.replaceState){
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

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