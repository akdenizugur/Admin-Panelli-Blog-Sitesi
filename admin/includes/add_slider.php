<div class="container">
    <div class="row">
        <h2>Yeni Gönderi</h2>
        <div class="col-sm-12 col-lg-7">
            <form action="slider.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Slider Başlığı</label>
                    <input type="text" name="title" placeholder="Slider Başlığı" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Slider Durumu</label>
                    <select class="form-control" name="status">
                        <option value="draft">Gizle</option>
                        <option value="published">Yayınla</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Slider Resmi</label>
                    <input type="file" name="slider_image" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" name="publish" value="Gönder" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>

</div>
