<?php
(isset($_GET['cat_id'])) ? $cat_id = $_GET['cat_id'] : header("Location: index.php");
$query = "SELECT * FROM posts WHERE post_category_id=$cat_id ORDER BY post_id DESC";
$result = mysqli_query($connection, $query);
if (mysqli_num_rows($result) === 0) {
  echo "<h4>Kategoride Gönderi Yok.</h4>";
} {
  while ($row = mysqli_fetch_assoc($result)) {
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_category = $row['post_category'];
    $post_category_id = $row['post_category_id'];
    $post_content = $row['post_content'];
    $post_tags = $row['post_tags'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $date = $row['post_date'];
    $post_views = $row['post_views'];
    $post_comment_count = $row['post_comment_count'];
?>
    <h4 class="mb-4"><?php echo $post_category . " Kategorisinden Sonuçlar"; ?></h4>
    <div class="single-amenities">
      <div class="amenities-thumb">
        <img class="img-fluid w-100" src="admin/<?php echo $post_image; ?>" alt="Image placeholder">
        <a href="single.php?post=<?php echo $post_id; ?>" class="blog-entry element-animate" data-animate-effect="fadeIn" style="text-decoration: none;">
      </div>
      <div class="amenities-details">
        <h5 style="color: #343a40; font-size: 30px; text-decoration: none;"><?php echo $post_title; ?></h5>
        <div class="amenities-meta mb-10">
          <a><span class="ti-calendar"></span><?php echo $date; ?></a>
          <a><span class="ti-comment"></span><?php echo $post_comment_count; ?></a>
          <a><span class="ti-user"></span><?php echo $post_author; ?></a>
        </div>

        <div class="d-flex justify-content-between mt-20">
          <div>
            <a href="single.php?post=<?php echo $post_id; ?>" class="blog-post-btn" style="text-decoration: none;">
              Okumaya Devam Et <span class="ti-arrow-right"></span>
            </a>
          </div>
          <div class="category">
            <a href="category.php?cat_id=<?php echo $post_category_id; ?>" style="text-decoration: none;">
              <span class="ti-folder mr-1"></span> <?php echo $post_category; ?>
            </a>
          </div>
        </div>
      </div>
    </div>

<?php }
}
?>