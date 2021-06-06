<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" /> <!-- Mobile Specific Meta -->

  <!-- Favicon-->
  <link rel="shortcut icon" href="images/fav.png" />
  <!-- Author Meta -->
  <meta name="author" content="CodePixar" />
  <!-- Meta Description -->
  <meta name="description" content="" />
  <!-- Meta Keyword -->
  <meta name="keywords" content="" />
  <!-- meta character set -->
  <meta charset="UTF-8" />
  <!-- Site Title -->
  <title>Revive</title>

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



  <?php include 'includes/navigation.php'; ?>




  <!--================ End Header Area =================-->

  <!--================ Start banner Area =================-->
  <?php include 'includes/slider.php'; ?>
  <!--================ End banner Area =================-->

  <!--================ Start Blog Post Area =================-->
  <section class="blog-post-area section-gap relative">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="row">
            <?php include 'includes/posts.php'; ?>
          </div>





          <div class="row">
            <div class="col-lg-12">
              <nav class="blog-pagination justify-content-center d-flex">
                <ul class="pagination">



                  <?php
                  if ($page > 1)
                    echo "<li class='page-item'><a class='page-link' aria-label='Önceki' href='index.php?page=" . ($page - 1) . "'><span aria-hidden ='true'><span class='ti-arrow-left'></span></span></a></li>";

                  for ($i = 1; $i <= $count; $i++) {
                    if ($i == $page)
                      echo "<li class='page-item active'><a class='page-link' href = 'index.php?page=$i'>0$i</a></li>";
                    else
                      echo "<li class='page-item'><a class='page-link' href = 'index.php?page=$i'>0$i</a></li>";
                  }

                  if ($i > $page)
                    echo "<li class='page-item'><a class='page-link' aria-label='Sonraki' href='index.php?page=" . ($page + 1) . "'><span aria-hidden ='true'><span class='ti-arrow-right'></span></span></a></li>";
                  ?>





                </ul>
              </nav>
            </div>
          </div>




        </div>
        <!-- Start Blog Post Siddebar -->
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
      <!-- End Blog Post Siddebar -->
    </div>
  </section>
  <!--================ End Blog Post Area =================-->

  <!--================ Start Footer Area =================-->
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