<?php

$pagecount = 3;
if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}


$postno = ($page - 1) * $pagecount;





$query = "SELECT * FROM posts WHERE post_status='published' ORDER BY post_id DESC"; //
$result = mysqli_query($connection, $query);
$count = mysqli_num_rows($result);
$count = ceil($count / $pagecount);

$query = "SELECT * FROM posts WHERE post_status='published' limit $postno, $pagecount"; //ORDER BY post_id DESC
$result = mysqli_query($connection, $query);
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
  <div class="single-amenities">
    <div class="amenities-thumb">
      <img class="img-fluid w-100" src="admin/<?php echo $post_image; ?>" alt="Image placeholder">
      <a href="single.php?post=<?php echo $post_id; ?>" class="blog-entry element-animate" data-animate-effect="fadeIn">
    </div>
    <div class="amenities-details">
      <a href="single.php?post=<?php echo $post_id; ?>" style="color: #343a40; font-size: 30px; text-decoration: none;"><?php echo $post_title; ?></a>
      <div class="amenities-meta mb-10">

        <a>Yazar: <?php echo $post_author; ?> </a> <br>
        <a>Tarih: <?php echo $date; ?> </a>
      </div>

      <div class="d-flex justify-content-between mt-20">
        <div>
          <a href="single.php?post=<?php echo $post_id; ?>" style="text-decoration: none;" class="blog-post-btn">
            Okumaya Devam Et <span class="ti-arrow-right"></span>
          </a>
        </div>
        <div class="category">
          <a href="category.php?cat_id=<?php echo $post_category_id; ?>">
            <span class="ti-folder mr-1"></span> <?php echo $post_category; ?>
          </a>
        </div>
      </div>
    </div>
  </div>
<?php }
?>