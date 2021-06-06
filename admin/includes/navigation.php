<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Gezinmeyi Aç</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Admin</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li><a href="../index.php">Siteye Git</a></li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Kullanıcı <?php echo $username; ?><b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="#"><i class="fa fa-fw fa-user"></i> Profil</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="index.php?logout"><i class="fa fa-fw fa-power-off"></i> Çıkış</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Panel</a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-send"></i> Gönderiler <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo" class="collapse">
                    <li>
                        <a href="posts.php?source=">Gönderilere Bak</a>
                    </li>
                    <li>
                        <a href="posts.php?source=add_new">Yeni Gönderi Ekle</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="categories.php"><i class="fa fa-fw fa-suitcase"></i> Kategorilier</a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#slider"><i class="fa fa-fw fa-send"></i> Sliderlar <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="slider" class="collapse">
                    <li>
                        <a href="slider.php?source=">Sliderlara Bak</a>
                    </li>
                    <li>
                        <a href="slider.php?source=add_new">Yeni Slider Ekle</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="comment.php"><i class="fa fa-fw fa-comment"></i> Yorumlar </a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#users"><i class="fa fa-fw fa-users"></i> Kullanıcılar <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="users" class="collapse">
                    <li>

                        <a href="view_users.php">Kullanıcıları Görüntüle</a>
                    </li>
                    <li>
                        <a href="users.php?source=add_user">Yeni Kullanıcı Ekle</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="contact.php"><i class="fa fa-fw fa-user"></i> İletişim</a>
            </li>
            <li>
                <a href="about.php"><i class="fa fa-fw fa-user"></i> Hakkımda</a>
            </li>
            <li>
                <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profil</a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
<script src="bootstrap/js/jquery.js"></script>