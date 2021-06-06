<?php include 'includes/header.php'; 
$email = $_SESSION['userLogged'];
if(isset($_POST['update_image']))
{
	$pwd = $_POST['conf_pwd'];
	$query = mysqli_query($connection, "SELECT password FROM users WHERE email = '$email'");
	$record = mysqli_fetch_array($query);
	$hashPwd = md5($pwd);
	$pwdfromdb = $record['password'];
	if($pwdfromdb == $hashPwd)
	{
if(isset($_FILES['image_file']) && $_FILES['image_file']['name']) {
		$dir = "users/profile_pics/";
		$fileName = $_FILES['image_file']['name'];
		$fileTmpName = $_FILES['image_file']['tmp_name'];
		$fileExt = explode('.', $fileName);
		$fileActExt = strtolower(end($fileExt));

			$newImage = uniqid("profilepic",true) . "." . $fileActExt;
			$target = $dir . basename($newImage);
			if(move_uploaded_file($fileTmpName, $target)) {
				$query = mysqli_query($connection, "UPDATE users SET profile_pic = '$target' WHERE email = '$email'");
				if($query)
				{
					header("Location:profile.php");
				}
				else
				{
					die(mysqli_error($connection));
				}
			}
		}
	}
	else
	{
		die("Şifreler Eşleşmiyor.");
	}
}



//Şifre Güncelleme
if(isset($_POST['update_password']))
{
	$oldPwd = $_POST['oldPwd'];
	$newPwd = $_POST['pwd'];
	$query = mysqli_query($connection, "SELECT password FROM users WHERE email = '$email'");
	$data = mysqli_fetch_array($query);
	$pwdfromdb = $data['password'];
	$hashPwd = md5($oldPwd);
	if($pwdfromdb == $hashPwd)
	{
		$newHashPwd = md5($newPwd);
		$query = mysqli_query($connection, "UPDATE users SET password = '$newHashPwd' WHERE email = '$email'");
		if($query)
		{
			header("Location:profile.php?password_update");
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
                <p class="alert alert-info col-md-6">Kullanıcı Adını Ve Emaili Değiştirmek İçin <a href="profile.php"><b>Ayarlara</b></a> Gidin</p>
                <div class="col-md-12">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="col-md-6">
                            <div class="form-group">
                            	<label for = "username"> Resim Yükle </label>
                            	<input type="file" name="image_file" class="form-control">
                            </div>
                            <div class="form-group">
                            	<label for = "username"> Şifre </label>
                            	<input type="password" name="conf_pwd" class="form-control">
                            </div>
                        <div class="form-group">
                            	<input type="submit" name="update_image" class="btn btn-success" value="Profil Resmini Güncelle">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            	<label for = "username"> Eski Şifre </label>
                            	<input type="password" name="oldPwd" id="oldPwd" class="form-control">
                            	<p id = "check" style="font-size: 11px;"></p>
                            </div>
                            <div class="form-group">
                            	<label for = "username"> Yeni Şifre </label>
                            	<input type="password" name="pwd" class="form-control">
                            </div>
                        <div class="form-group">
                            	<input type="submit" name="update_password" class="btn btn-success" value="Şifreyi Güncelle">
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
    	$("#oldPwd").keyup(function(){
    		let text = document.getElementById("oldPwd").value;
    		$("#check").load('check.php',{
    			text: text
    		});
    	});
    });
</script>

</body>

</html>