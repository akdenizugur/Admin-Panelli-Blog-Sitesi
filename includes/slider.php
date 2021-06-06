<?php
$query = "select * from about";
$result = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($result)) {
  $facebook             = $row["facebook"];
  $twitter              = $row["twitter"];
  $instagram            = $row["instagram"];
  $youtube              = $row["youtube"];
}
?>


<section class="home-banner-area relative">
  <div class="container-fluid">
    <div class="row">
      <div class="owl-carousel home-banner-owl">
        <?php
        $query = "SELECT * FROM slider WHERE slider_status='published' ORDER BY slider_id ASC limit 4"; //ORDER BY post_id DESC
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)) {
          $slider_id = $row['slider_id'];
          $slider_title = $row['slider_title'];
          $slider_status = $row['slider_status'];
          $slider_image = $row['slider_image'];
        ?>
          <div class="banner-img">
            <img class="img-fluid" src="admin/<?php echo $slider_image; ?>" alt="Image placeholder" />
            <div class="text-wrapper">
              <a class="d-flex" style="text-decoration: none;">
                <h1><?php echo $slider_title; ?></h1>
              </a>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>


  <div class="social-icons">
    <ul>
      <li>
        <a href="<?php echo $facebook; ?>"><i class="fa fa-facebook"></i></a>
      </li>
      <li>
        <a href="<?php echo $twitter; ?>"><i class="fa fa-twitter"></i></a>
      </li>
      <li>
        <a href="<?php echo $instagram; ?>"><i class="fa fa-instagram"></i></a>
      </li>
      <li>
        <a href="<?php echo $youtube; ?>"><i class="fa fa-youtube"></i></a>
      </li>
      <li class="diffrent">Takip Edin</li>
    </ul>
  </div>
</section>