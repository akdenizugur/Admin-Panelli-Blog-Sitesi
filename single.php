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
  <title>Blog Sayfam</title>

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



  <?php include 'includes/navigation.php' ?>


  <!--================ End Header Area =================-->

  <!--================ Start banner Area =================-->

  <!--================ End banner Area =================-->

  <!--================Blog Area =================-->
  <section class="blog_area section-gap single-post-area">
    <div class="container">
      <div class="row">

        <?php
        if (isset($_GET['post'])) {
          $p_id = $_GET['post'];

          $query = "SELECT * FROM posts WHERE post_id = $p_id";
          $result = mysqli_query($connection, $query);
        } else {
          header("Location: index.php");
        }

        ?>


        <div class="col-lg-8">


          <?php

          while ($row = mysqli_fetch_assoc($result)) {
            $post_id            = $row['post_id'];
            $post_title         = $row['post_title'];
            $post_author        = $row['post_author'];
            $post_category      = $row['post_category'];
            $post_category_id   = $row['post_category_id'];
            $post_content       = $row['post_content'];
            $post_tags          = explode(',', $row['post_tags']);
            $post_status        = $row['post_status'];
            $post_image         = $row['post_image'];
            $date               = $row['post_date'];
            $post_views         = $row['post_views'];
            $post_comment_count = $row['post_comment_count'];
          ?>


            <div class="main_blog_details">
              <img src="admin/<?php echo $post_image; ?>" alt="Image" class="img-fluid">
              <h4 class="mb-4"><?php echo $post_title; ?></h4>
              <div class="user_details">
                <div class="float-left">
                  Kategori : <a style="text-decoration: none;" href="category.php?cat_id=<?php echo $post_category_id; ?>"><?php echo $post_category; ?></a>
                  Etiketler : <a><?php foreach ($post_tags as $tag) {
                                    echo "$tag";
                                  }
                                  ?></a>
                </div>


                <div class="float-right mt-sm-0 mt-3">
                  <div class="media">
                    <div class="media-body">
                      <h5>Yazar: <?php echo $post_author; ?> </h5>
                      <h5>Tarih: <?php echo $date; ?> </h5>
                      <h5>
                        Yorum:
                        <?php
                        (isset($_GET['post'])) ? $post_id = $_GET['post'] : $post_id = 0;
                        $query = mysqli_query($connection, "SELECT * FROM comments WHERE status='Approved' AND post_id=$post_id");
                        $num_comments = mysqli_num_rows($query);
                        echo $num_comments;
                        ?>
                      </h5>
                    </div>
                  </div>
                </div>
              </div>
              <p align="justify" style="font-size: 15px;"><?php echo $post_content; ?></p>
            <?php }




            ?>





            <div class="news_d_footer flex-column flex-sm-row">
              <div class="news_socail ml-sm-auto mt-sm-0 mt-2">
                <a href="<?php echo $facebook; ?>"><i class="fa fa-facebook"></i></a>
                <a href="<?php echo $twitter; ?>"><i class="fa fa-twitter"></i></a>
                <a href="<?php echo $instagram; ?>"><i class="fa fa-instagram"></i></a>
                <a href="<?php echo $youtube; ?>"><i class="fa fa-youtube-play"></i></a>
              </div>
            </div>
            </div>


            <h4>
              <?php
              (isset($_GET['post'])) ? $post_id = $_GET['post'] : $post_id = 0;
              $query = mysqli_query($connection, "SELECT * FROM comments WHERE status='Approved' AND post_id=$post_id");
              $num_comments = mysqli_num_rows($query);
              echo $num_comments . " yorum(lar)";
              ?>
            </h4>
            <ul class="comment-list">
              <li class="comment">
                <div class="vcard">

                </div>
                <div class="comments-area">
                  <div class="comment-list">
                    <div class="single-comment justify-content-between d-flex">
                      <div class="user justify-content-between d-flex">
                        <div class="thumb">

                        </div>
                        <div class="desc">
                          <p class="comment">
                            <?php
                            if (isset($_GET['post'])) {
                              $id = $_GET['post'];
                              $comment_obj->getApprovedComments($id);
                            }
                            ?>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>



            </ul>

            <?php
            if (isset($_GET['post'])) {
              $id = $_GET['post'];
              if (isset($_POST['comment'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $body = $_POST['body'];
                $comment_obj->addComments($id, $name, $email, $body);
              }
            }
            ?>
            <div class="comment-form">
              <h4>Yorum Bırakın</h4>
              <form action="single.php?post=<?php echo $post_id; ?>" method="POST">
                <div class="form-group">


                  <div class="form-group col-lg-6 col-md-6 name">
                    <input type="text" name="name" class="form-control" id="name" placeholder="İsminizi Girin" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
                  </div>
                  <div class="form-group col-lg-6 col-md-6 name">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Mail Adresinizi Girin" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
                  </div>



                  <textarea class="form-control mb-10" rows="5" name="body" placeholder="Mesajınızı Girin" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                </div>
                <input type="submit" value="Yorum Yap" name="comment" class="primary-btn submit_btn">
              </form>
            </div>
        </div>

        <div class="col-lg-4 sidebar-widgets">
          <div class="widget-wrap">
            <div class="single-sidebar-widget search-widget">
              <form action="search.php" class="search-form" method="post">
                <div class="form-group">
                  <span class="icon fa fa-search"></span>
                  <input type="text" name="search" class="form-control" id="s" placeholder="Arama Yapın">
                </div>
              </form>
            </div>
            <div class="single-sidebar-widget share-widget">
              <h4 class="share-title">Sosyal Medya</h4>
              <div class="social-icons mt-20">
                <a href="<?php echo $facebook; ?>"><i class="fa fa-facebook"></i></a>
                <a href="<?php echo $twitter; ?>"><i class="fa fa-twitter"></i></a>
                <a href="<?php echo $instagram; ?>"><i class="fa fa-instagram"></i></a>
                <a href="<?php echo $youtube; ?>"><i class="fa fa-youtube-play"></i></a>
              </div>
            </div>
            <?php include 'includes/category.php'; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================Blog Area =================-->

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