<?php
// get slider content by id
if (isset($_GET['edit_slider']) && $_GET['edit_slider'] != "") {
    $edit_id = $_GET['edit_slider'];
    $query = mysqli_query($connection, "SELECT * FROM slider WHERE slider_id=$edit_id");
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_array($query);
        $title = $data['slider_title'];
        $status = $data['slider_status'];
        $image = $data['slider_image'];
    } else {
        die("Veritabanında böyle bir kayıt yok.");
    }
} else {
    die("Başarısız.");
}
?>

<div class="container">
    <div class="row">
        <h2>Slider Düzenle</h2>
        <div class="col-sm-12 col-lg-7">
            <form action="slider.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Slider Başlığı</label>
                    <input type="text" name="title" placeholder="Slider Başlığı" class="form-control" value="<?php echo $title; ?>">
                </div>



                <div class="form-group">
                    <label for="">Slider Durumu</label>
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
                    <label for="">Slider Resmi</label>
                    <input type="file" name="slider_image" class="form-control">
                    <br>
                    <input type="text" name="image" value="<?php echo $image; ?>" style="display: none;">
                    <input type="text" name="editID" value="<?php echo $edit_id; ?>" style="display: none;">
                    <img src="<?php echo $image; ?>" style="width: 150px; height: 150px; border-radius: 10px;">
                </div>
                <div class="form-group">
                    <input type="submit" name="modify" value="Slider Düzenle" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>