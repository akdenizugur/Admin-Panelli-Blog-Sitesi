<?php include 'includes/header.php'; 
$email = $_SESSION['userLogged'];
$query = mysqli_query($connection, "SELECT * FROM users WHERE email = '$email'");
$data = mysqli_fetch_array($query);

//Kullanıcı Güncelleme
if(isset($_POST['update']))
{
    $usr = $_POST['username'];
    $em = $_POST['email'];
    if(!empty($usr) && !empty($em))
    {
        $query = mysqli_query($connection, "UPDATE users SET username = '$usr', email = '$em' WHERE email = '$email'");
        if($query)
        {
            $_SESSION['userLogged'] = $em;
            header("Location: profile.php?message=updated");
        }
    }
}
?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include 'includes/navigation.php'; ?>


    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <h3>Kullanıcı Düzenlemeye Hoş Geldiniz..</h3>
                <br>
                <p class="alert alert-info col-md-6">Profil Fotoğrafınızı Veya Şifrenizi Değiştirmek İçin <a href="settings.php"><b>Ayarlara</b></a> Gidin</p>
                <div class="col-md-12">
                    <img src="<?php echo $data['profile_pic']; ?>" alt="" style="width: 150px; height: 150px; border-radius: 100%;">
                    <form action="" method="post">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Kullanıcı Adı</label>
                                <input type="text" name="username" class="form-control" value="<?php echo $data['username'];?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control"value="<?php echo $data['email'];?>">
                            </div>
                            <div class="form-group">
                                <label for="role">Rol</label>
                                <input type="text" name="role" class="form-control" value="<?php echo $data['role'];?>" disabled>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="update" class="btn btn-success" value="Update your profile">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="bootstrap/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>

<!-- our ajax call  -->
<script>
    $(document).ready(function() {
        $("#form").submit(function(e) {
            let name = document.querySelector("#username").value,
                email = document.querySelector("#email").value,
                pwd = document.querySelector("#password").value,
                role = document.querySelector("#role").value,
                submit = document.querySelector("#submit").value;
            $("#msg").load('validator/validate.php', {
                username: name,
                email: email,
                password: pwd,
                role: role,
                submit: submit
            });
            e.preventDefault();
        });
    });
</script>

</body>

</html>