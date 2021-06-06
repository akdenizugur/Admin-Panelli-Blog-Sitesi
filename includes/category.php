<?php
$query = "SELECT * FROM categories ORDER BY cat_id DESC LIMIT 6";
$result = mysqli_query($connection, $query);
?>

<div class="single-sidebar-widget post-category-widget">
  <h4 class="category-title">Kategoriler</h4>
  <ul class="cat-list mt-20">
    <?php
    while ($row = mysqli_fetch_array($result)) {
      $cat_id = $row['cat_id'];
      $cat_title = $row['cat_title'];
      $sql = mysqli_query($connection, "SELECT * FROM posts WHERE post_category_id=$cat_id");
      $span = mysqli_num_rows($sql);
      echo "<li><a href='category.php?cat_id=$cat_id' style='text-decoration:none;'>$cat_title <span>($span)</span></a></li>";
    }

    ?>
  </ul>
</div>