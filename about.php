<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png" />
    <!-- Author Meta -->
    <meta name="author" content="CodePixar" />
    <!-- Meta Description -->
    <meta name="description" content="" />
    <!-- Meta Keyword -->
    <meta name="keywords" content="" />
    <!-- meta character set -->
    <meta charset="UTF-8" />
    <!-- Site Title -->
    <title>Blog Details</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600|Playfair+Display:700,700i" rel="stylesheet" />
    <!--
			CSS
			============================================= -->
    <link rel="stylesheet" href="css/linearicons.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/magnific-popup.css" />
    <link rel="stylesheet" href="css/nice-select.css" />
    <link rel="stylesheet" href="css/owl.carousel.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/bootstrap-datepicker.css" />
    <link rel="stylesheet" href="css/themify-icons.css" />
    <link rel="stylesheet" href="css/main.css" />
</head>

<body>
    <!--================ Start Header Area =================-->
    <?php include 'includes/header.php'; ?>





    <?php
    $query = "select * from about";
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $biography_name       = $row["biography_name"];
        $biography_about      = $row["biography_about"];
        $biography_about_long = $row['biography_about_long'];
        $about_me             = $row["about_me"];
        $facebook             = $row["facebook"];
        $twitter              = $row["twitter"];
        $instagram            = $row["instagram"];
        $youtube              = $row["youtube"];
    }
    ?>

    <?php include 'includes/navigation.php' ?>


    <!--================ End Header Area =================-->
    <!--================ Start banner Area =================-->

    <!--================ End banner Area =================-->
    <section class="blog-post-area section-gap relative">
        <div class="container">
            <div class="row blog-entries">
                <div class="col-md-12 col-lg-8 main-content">
                    <h4 style="text-align: center;">Hakkımda</h4>
                    <div class="sidebar-box">
                        <div class="bio text-center">
                            <img src="images/1.jpg" alt="Image Placeholder" class="img-fluid">
                            <div class="bio-body"><br>
                                <h4><?php echo $biography_name ?></h4><br>
                                <p align="justify"><?php echo $biography_about_long ?></p>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- END main-content -->

                <div class="col-lg-4 sidebar-widgets">
                    <div class="widget-wrap">
                        <div class="single-sidebar-widget search-widget">
                            <form action="search.php" class="search-form" method="post">
                                <div class="form-group">
                                    <input placeholder="Arama Yapın" name="search" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </form>


                        </div>
                        <?php include 'includes/category.php'; ?>

                        <?php include 'includes/sidebar.php'; ?>


                    </div>

                </div>
            </div>

        </div>

        <!-- END sidebar-box -->

        <!-- END sidebar-box -->

        <!-- END sidebar-box -->
        <!-- END sidebar-box -->

        <!-- END sidebar -->

        </div>
        </div>
    </section>


    <?php include 'includes/footer.php'; ?>
    <!--================ End Footer Area =================-->

    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.tabs.min.js"></script>
    <script src="js/parallax.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/main.js"></script>
</body>

</html>