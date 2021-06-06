<?php
// get categories
$sql = "SELECT * FROM categories";
$res = mysqli_query($connection, $sql);
// get posts content by id
if (isset($_GET['edit_post']) && $_GET['edit_post'] != "") {
  $edit_id = $_GET['edit_post'];
  $query = mysqli_query($connection, "SELECT * FROM posts WHERE post_id=$edit_id");
  if (mysqli_num_rows($query) > 0) {
    $data = mysqli_fetch_array($query);
    $title = $data['post_title'];
    $author = $data['post_author'];
    $category = $data['post_category'];
    $content = $data['post_content'];
    $tags = $data['post_tags'];
    $status = $data['post_status'];
    $image = $data['post_image'];
  } else {
    die("Veritabanında böyle bir kayıt yok.");
  }
} else {
  die("Başarısız.");
}
?>

<div class="container">
  <div class="row">
    <h2>Göndeiyi Düzenle</h2>
    <div class="col-sm-12 col-lg-7">
      <form action="posts.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="">Gönderinin Başlığı</label>
          <input type="text" name="title" placeholder="Gönderinin Başlığı" class="form-control" value="<?php echo $title; ?>">
        </div>
        <div class="form-group">
          <label for="">Gönderinin Yazarı</label>
          <input type="text" value="<?php  if (isset($_COOKIE["username"])){echo $_SESSION['username'];} ?>" name="author" placeholder="Gönderinin Yazarı" class="form-control" value="<?php echo $author; ?>">
        </div>
        <div class="form-group">
          <label for="">Gönderinin Kategorisi</label>
          <select class="form-control" name="category">
            <option value="<?php echo $category; ?>"><?php echo $category; ?></option>
            <?php
            while ($row = mysqli_fetch_array($res)) {
              $cat_title = $row['cat_title'];
              echo "<option value='$cat_title'>$cat_title</option>";
            }
            ?>

          </select>
        </div>

        <div class="form-group">
          <label for="">Gönderinin İçeriği</label>
          <textarea name="content" rows="8" cols="80" class="form-control" id="editor"><?php echo $content; ?></textarea>
        </div>
        <div class="form-group">
          <label for="">Gönderinin Etiketleri</label>
          <input type="text" name="tags" placeholder="Yazarken virgül koy" class="form-control" value="<?php echo $tags; ?>">
        </div>
        <div class="form-group">
          <label for="">Gönderinin Durumu</label>
          <select class="form-control" name="status">
            <?php
            if ($status == "draft") {
              echo "<option value='draft'>Gizli</option>
                  <option value='published'>Yayında</option>";
            } else {
              echo "<option value='published'>Yayında</option>
                      <option value='draft'>Gizli</option>";
            }
            ?>

          </select>
        </div>
        <div class="form-group">
          <label for="">Gönderinin Resmi</label>
          <input type="file" name="post_image" class="form-control">
          <br>
          <input type="text" name="image" value="<?php echo $image; ?>" style="display: none;">
          <input type="text" name="editID" value="<?php echo $edit_id; ?>" style="display: none;">
          <img src="<?php echo $image; ?>" style="width: 150px; height: 150px; border-radius: 10px;">
        </div>
        <div class="form-group">
          <input type="submit" name="modify" value="Gönderiyi Düzenle" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>

</div>
<script src="../ckeditor/ckeditor.js"></script>
<script>
CKEDITOR.replace('editor');
</script>