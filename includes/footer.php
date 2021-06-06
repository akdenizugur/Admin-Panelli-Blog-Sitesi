 <?php include'includes/db.php'; ?>
 <?php
$query = "select * from about";
$result = mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($result))
{
  $about_me             = $row["about_me"];
  $facebook             = $row["facebook"];
  $twitter              = $row["twitter"];
  $instagram            = $row["instagram"];
  $youtube              = $row["youtube"];
}
 ?>

      <footer class="footer-area section-gap">
      <div class="container">
        <div class="row">
          <div class="col-lg-3  col-md-6 col-sm-6">
            <div class="single-footer-widget">
              <h6>Hakkımda</h6>
              <p style="color: white;">
                <?php echo $about_me; ?>
              </p>
            </div>
          </div>
          <div class="col-lg-4  col-md-6 col-sm-6">
            
          </div>
          <div class="col-lg-3  col-md-6 col-sm-6">

          </div>
          <div class="col-lg-2 col-md-6 col-sm-6">
            <div class="single-footer-widget">
              <h6>Takip Edin</h6>
              <div class="footer-social d-flex align-items-center">
                <a href="<?php echo $facebook; ?>"><i class="fa fa-facebook"></i></a>
                <a href="<?php echo $twitter; ?>"><i class="fa fa-twitter"></i></a>
                <a href="<?php echo $instagram; ?>"><i class="fa fa-instagram"></i></a>
                <a href="<?php echo $youtube; ?>"><i class="fa fa-youtube-play"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
          <p class="footer-text m-0" style="color: white;">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tüm Hakları Saklıdır | Design By Uğur Akdeniz
</p>
        </div>
      </div>
    </footer>