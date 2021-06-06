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
  <section class="blog-post-area section-gap relative">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="row">

            <?php include 'includes/cat_posts.php'; ?>

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

  <?php include 'includes/footer.php'; ?>