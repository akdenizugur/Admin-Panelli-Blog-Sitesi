<div class="single-sidebar-widget popular-post-widget">
  <h4 class="popular-title">Son Gönderiler</h4>
  <div class="popular-post-list">

    <?php
    $query = "SELECT * FROM posts ORDER BY post_id DESC LIMIT 5";
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


      <div class="single-post-list">
        <a href="single.php?post=<?php echo $post_id; ?>" style="text-decoration: none;">
          <div class="thumb">
            <img class="img-fluid" src="admin/<?php echo $post_image; ?>" alt="">
          </div>

          <div class="details mt-20">
            <h6 style="color: #343a40;text-decoration: none;"><?php echo $post_title; ?></h6>
            <a>
              <p style="color: #343a40;text-decoration: none;"> <?php echo $date; ?> </p>
            </a>
          </div>

        </a>
      </div>
    <?php }
    ?>

  </div>
</div>