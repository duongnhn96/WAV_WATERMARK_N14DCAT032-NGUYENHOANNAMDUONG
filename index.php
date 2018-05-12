
<?php session_start(); 
$url_host="http://localhost/musicbyduong/";
ini_set("display_errors",0);
ini_set('memory_limit', '-1');
ini_set('max_execution_time', 180);
?>
<!DOCTYPE html>
<html>
<head>
    <title>WaterMask Music By - Nguyen Hoan Nam Duong - N14DCAT032</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <link href="css/styles.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/musicplayer.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){     
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
            });
        });
    </script>


</head>
<body>
    <!-- Body-Starts-Here -->

    <div id="grad1">

        <a href="#"><h1>PINO WATERMARK</h1></a>

        <div class="page">

            <div class="container" style="padding-bottom: 50px;margin-top: 25px;">

                <!-- Banner-Starts-Here -->

                <div class="banner">

                    <!-- Navbar-Starts-Here -->

                    <nav class="navbar navbar-default">

                        <div class="container">

                            <div class="navbar-header">

                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>                        
                                </button>

                            </div>

                            <div class="collapse navbar-collapse" id="myNavbar">

                                <ul class="nav navbar-nav navbar-right">
                                    <li><a  href="<?php echo $url_host;?>" class="button shadow-radial" >TRANG CHỦ</a></li>
                                    <li><a href="<?php echo $url_host;?>Check-WaterMask.html" class="button shadow-radial" >CHECK WATERMARK</a></li>
                                    <li><a href="<?php echo $url_host;?>Nhac-cua-tui.html" class="button shadow-radial" >NHẠC CỦA TUI</a></li>
                                    <?php 
                                    if(!isset($_SESSION['user'])) include_once('php/formlogin.php'); 
                                    else include_once('php/formhello.php');
                                    ?>

                                </ul>


                            </div>

                            <div class="clearfix"></div>

                        </div>

                    </nav>

                    <!-- //Navbar-Ends-Here -->
                    <?php include('php/sankhau.php'); ?>
                    <!-- Chart-Starts-Here -->

                   <!--  <div class="col-md-4" id="heading">

                        <h2>CHART</h2>
                        <span>BUSTERS?</span>
                        <div class="para">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                        <a href="#" class="button outline-inward">EXPLORE</a>  

                    </div>

                    <div class="col-md-8" id="girl">

                        <div class="headphone">
                            <img src="./images/girl.png" alt="girl">
                        </div>

                    </div>

                    

                    <! </div> -->

                    <!-- //Banner-Ends-Here -->

                    <!-- Content-Starts-Here -->
                </div>

                <div class="footer">

                    <ul class="social" id="follow">
                        <li><a href="https://www.facebook.com/PinoTarot" class="facebook" title="Go to Our Facebook Page"></a></li>
                        <li><a href="https://www.facebook.com/PinoTarot" class="twitter" title="Go to Our Twitter Account"></a></li>
                        <li><a href="https://www.facebook.com/PinoTarot" class="googleplus" title="Go to Our Google Plus Account"></a></li>
                        <li><a href="https://www.facebook.com/PinoTarot" class="instagram" title="Go to Our Instagram Account"></a></li>
                        <li><a href="https://www.facebook.com/PinoTarot" class="youtube" title="Go to Our Youtube Channel"></a></li>
                        <li><a href="https://www.facebook.com/PinoTarot" class="itunes" title="Go to Our iTunes App"></a></li>
                    </ul>

                    <div class="copyright">
                        <p>&copy; 2018 NGUYEN HOAN NAM DUONG </a></p>
                    </div>

                    <script type="text/javascript">
                        $(document).ready(function() {
                  
                        $().UItoTop({ easingType: 'easeOutQuart' });
                    });
                </script>

                <a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

            </div>

            <!-- //Footer-Ends-Here -->
        </div>
        
    </div>

</div>

<!-- //Body-Ends-Here -->

</body>

</html>