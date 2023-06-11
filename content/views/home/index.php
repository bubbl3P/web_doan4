<?php require('content/views/shared/header.php');

?>
<div role="main" class="main">
    <?php
    require 'slide.php';
    require 'newproduct.php'; ?>
    <div class="home-concept">
        <div class="container">

            <div class="row center">
                <span class="sun"></span>
                <span class="cloud"></span>
                <div class="col-md-2 col-md-offset-1">
                    <div class="process-image" data-appear-animation="bounceIn">
                        <img style="width: 165px; height: 165px" src="public/img/rm4.jpg" />
                        <strong></strong>
                    </div>
                </div>s

                <div class="col-md-2">
                    <div class="process-image" data-appear-animation="bounceIn" data-appear-animation-delay="200">
                        <img  style="width: 165px; height: 165px" src="public/img/rm7.png"/>
                        <strong></strong>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="process-image" data-appear-animation="bounceIn" data-appear-animation-delay="400">
                        <img  style="width: 165px; height: 165px" src="public/img/rm8.png" alt="" />
                        <strong></strong>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-1">
                    <div class="project-image">
                        <div id="fcSlideshow" class="fc-slideshow">
                            <ul class="fc-slides">
                                <li><a href=""><img class="img-responsive" src="public/img/rm1.png" /></a></li>
                                <li><a href=""><img class="img-responsive" src="public/img/rm2.png" /></a></li>
                                <li><a href=""><img class="img-responsive" src="public/img/rm3.png" /></a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php
    require 'hotproduct.php';
    require 'saleproduct.php';
    ?>
</div>
<?php
require('content/views/shared/footer.php');
