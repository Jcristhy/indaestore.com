<?php 
    $active='Home';
    include("includes/header.php");
?>

   <!--CONTAINER BEGIN [SLIDING IMAGE]--> 
   <div class = "container" id = "slider">
       <!--col-md-12 begin-->
        <div class = "col-md-12">
            <!--CAROUSEL BEGIN-->
            <div class="carousel slide" id="myCarousel" data-ride="carousel">
                <!--CAROUSEL INDICATOR BEGIN-->
                <!--SLIDER IMAGE-->
                <ol class="carousel-indicators">
                    <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                    <li data-target = "#myCarousel" data-slide-to = "1"></li>
                    <li data-target = "#myCarousel" data-slide-to = "2"></li>
                    <li data-target = "#myCarousel" data-slide-to = "3"></li>
                    <li data-target = "#myCarousel" data-slide-to = "4"></li>
                    <li data-target = "#myCarousel" data-slide-to = "5"></li>
                    <li data-target = "#myCarousel" data-slide-to = "6"></li>
                    <li data-target = "#myCarousel" data-slide-to = "7"></li>
                    <li data-target = "#myCarousel" data-slide-to = "8"></li>
                    <li data-target = "#myCarousel" data-slide-to = "9"></li>
                </ol>

                <!--CAROUSEL-INNER-->
                <div class = "carousel-inner">
                    <!--SLIDING IMAGES-->
                    <!--amount of slider to appear-->
                    <?php
                        $get_slides = "select * from slider LIMIT 0,1";

                        $run_slides = mysqli_query($con, $get_slides);

                        while($row_slides=mysqli_fetch_array($run_slides)){
                            $slide_name = $row_slides['slide_name'];
                            $slide_image = $row_slides['slide_image'];

                            echo "
                                <div class = 'item active'>
                                    <img src='admin_area/slides_images/$slide_image'>
                                </div>
                            ";
                        }

                        $get_slides = "select * from slider LIMIT 1,9";

                        $run_slides = mysqli_query($con, $get_slides);

                        while($row_slides=mysqli_fetch_array($run_slides)){
                            $slide_name = $row_slides['slide_name'];
                            $slide_image = $row_slides['slide_image'];

                            echo "
                                <div class = 'item'>
                                    <img src='admin_area/slides_images/$slide_image'>
                                </div>
                            ";
                        }
                    ?>
                </div>
                
                <!--LEFT CAROUSEL-CONTROL-->
                <a href = "#myCarousel" class = "left carousel-control" data-slide = "prev">
                    <span class = "glyphicon glyphicon-chevron-left"></span>
                    <span class = "sr-only">Previous</span>
                </a>

                <!--RIGHT CAROUSEL-CONTROL-->
                <a href = "#myCarousel" class = "right carousel-control" data-slide = "next">
                    <span class = "glyphicon glyphicon-chevron-right"></span>
                    <span class = "sr-only">Next</span>
                </a>
            </div>
        </div>
   </div>
   <!--CONTAINER FINISH [SLIDING IMAGE]-->

   <div id ="hot">
        <div class="box">
            <div class="container">
                <div class="col-md-12">
                    <h2>
                        Shop Collections
                    </h2>
                </div>
            </div>
        </div>
   </div>

   <!--CONTENT[CONTAINER] BEGIN-->
   <div id = "content" class = "container">
       <!--ROW BEGIN-->
       <div class = "row">
            <?php
                getPro(); //getproducts
            ?>
       </div>
   </div>
   <!--CONTENT[CONTAINER] FINISH-->

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