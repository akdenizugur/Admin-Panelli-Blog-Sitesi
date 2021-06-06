<?php
$sql = "SELECT * FROM posts ORDER BY post_id LIMIT 5";
$result = mysqli_query($connection, $sql);

 ?>

<div class="sidebar-box">
  <h3 class="heading">Etiketler</h3>
  <ul class="tags">
    <?php
      while($row = mysqli_fetch_assoc($result)){
        $tags = explode(',',$row['post_tags']);
        ?>
        <li><?php foreach($tags as $tag) {
                echo "<a href=''class='btn btn-primary' style='margin:2px;color:#000;'>#$tag</a>";
              }?></li>
              
              <?php }
      
     ?>

  </ul>
</div>
