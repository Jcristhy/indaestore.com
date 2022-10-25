<!--PAYMENT OPTION-->
<!--BOX BEGIN-->
<div class="box">
    <?php
        $session_email = $_SESSION['cust_email'];

        $select_customer = "select * from customers where cust_email='$session_email'";

        $run_customer = mysqli_query($con,$select_customer);

        $row_customer = mysqli_fetch_array($run_customer);

        $customer_id = $row_customer['cust_id'];
    ?>

    <h1 class = "text-center"> Payment Options </h1>

    <p class="lead text-center">
        <a href="order.php?cust_id=<?php echo $customer_id ?>"> Offline Payment </a>
    </p>

    <center>
        <p class="lead">
            <a href="#">
                PayPal Payment
                <img class="img-responsive" src="images/paypal-logo.png" alt="img=paypall">
            </a>
        </p>
    </center>
</div>
<!--BOX FINISH-->