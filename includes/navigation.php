<?php include 'includes/db.php'; ?>
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
<header class="header-area">
  <div class="container">
    <div class="header-wrap">
      <div class="header-top d-flex justify-content-between align-items-lg-center navbar-expand-lg">
        <div class="col menu-left">
          <a class="active" href="index.php" style="text-decoration: none;">Ana Sayfa</a>
          <a class="active" href="about.php" style="text-decoration: none;">Hakkımda</a>
          <a class="active" href="contact.php" style="text-decoration: none;">İletişim</a>
        </div>
        <div class="col-5 text-lg-center mt-2 mt-lg-0">
          <span class="logo-outer">
            <span class="logo-inner">
              <a href="index.php"><img class="mx-auto" src="images/logo.png" alt="" /></a>
            </span>
          </span>
        </div>
        <nav class="col navbar navbar-expand-lg justify-content-end">
          <!-- Toggler/collapsibe Button -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="lnr lnr-menu"></span>
          </button>

          <!-- Navbar links -->
          <div class="collapse navbar-collapse menu-right" id="collapsibleNavbar">
            <ul class="navbar-nav justify-content-center w-100">
              <li class="nav-item hide-lg">
                <a class="nav-link" href="index.php">Ana Sayfa</a>
                <a class="nav-link" href="about.php">Hakkımda</a>
                <a class="nav-link" href="contact.php">İletişim</a>
              </li>
              <li class="nav-item">
                <?php echo show_cat(); ?>
              </li>

            </ul>
          </div>
        </nav>
      </div>
    </div>
  </div>
</header>