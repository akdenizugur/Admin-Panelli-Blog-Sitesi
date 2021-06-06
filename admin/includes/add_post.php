<?php
$sql = "SELECT * FROM categories";
$res = mysqli_query($connection, $sql);

?>

<div class="container">
  <div class="row">
    <h2>Yeni Gönderi</h2>
    <div class="col-sm-12 col-lg-7">
      <form action="posts.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="">Gönderinin Başlığı</label>
          <input type="text" name="title" placeholder="Gönderinin Başlığı" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Gönderinin Yazarı</label>
          <input type="text" value="<?php if (isset($_COOKIE["username"])) {
                                      echo $_SESSION['username'];
                                    } ?>" name="author" placeholder="Gönderinin Yazarı" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Gönderinin Kategorisi</label>
          <select class="form-control" name="category">
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
          <textarea name="content" rows="8" cols="80" class="form-control" id="editor"></textarea>
        </div>
        <div class="form-group">
          <label for="">Gönderinin Etiketleri</label>
          <input type="text" name="tags" placeholder="Yazarken virgül koy" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Gönderinin Durumu</label>
          <select class="form-control" name="status">
            <option value="draft">Gizle</option>
            <option value="published">Yayınla</option>
          </select>
        </div>
        <div class="form-group">
          <label for="">Gönderinin Resmi</label>
          <input type="file" name="post_image" class="form-control">
        </div>
        <div class="form-group">
          <input type="submit" name="publish" value="Gönder" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>

</div>
<script src="../ckeditor/ckeditor.js"></script>
<script>
  CKEDITOR.replace('editor');
</script>