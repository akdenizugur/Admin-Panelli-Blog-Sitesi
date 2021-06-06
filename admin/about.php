<?php include 'includes/header.php';
$query = mysqli_query($connection, "SELECT * FROM about");
$data = mysqli_fetch_array($query);

//Kullanıcı Güncelleme
if (isset($_POST['updateabout'])) {
	$b_name       				= $_POST["biography_name"];
	$b_about      				= $_POST["biography_about"];
	$b_about_long				= $_POST["biography_about_long"];
	$b_about_me             	= $_POST["about_me"];
	$b_facebook             	= $_POST["facebook"];
	$b_twitter              	= $_POST["twitter"];
	$b_instagram            	= $_POST["instagram"];
	$b_youtube              	= $_POST["youtube"];


	if (!empty($b_name) && !empty($b_about) && !empty($b_about_long) && !empty($b_about_me) && !empty($b_facebook) && !empty($b_twitter) && !empty($b_instagram) && !empty($b_youtube)) {
		$query = mysqli_query($connection, "UPDATE about SET biography_name = '$b_name', biography_about = '$b_about', biography_about_long = '$b_about_long', about_me = '$b_about_me', facebook = '$b_facebook', twitter = '$b_twitter', instagram = '$b_instagram', youtube = '$b_youtube'");
		if ($query) {
			header("Location: about.php?message=updated");
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

				<h1 class="page-header">
					Admin Paneline Hoş Geldiniz..
				</h1>
				<div class="col-md-7">
					<h3>Hakkımda Düzenle</h3>
					<form action="" method="POST">
						<div class="form-group">
							<input type="text" name="biography_name" id="" class="form-control" placeholder="Biyografi İsmi" value="<?php echo $data['biography_name']; ?>">
						</div>
						<div class="form-group">
							<input type="text" name="biography_about" id="" class="form-control" placeholder="Biyografi Hakkımda" value="<?php echo $data['biography_about']; ?>">
						</div>
						<div class="form-group">
							<input type="textarea" name="biography_about_long" id="" class="form-control" placeholder="Biyografi Hakkımda Uzun" value="<?php echo $data['biography_about_long']; ?>">
						</div>
						<div class="form-group">
							<input type="textarea" name="about_me" id="" class="form-control" placeholder="Hakkımda" value="<?php echo $data['about_me']; ?>">
						</div>
						<div class="form-group">
							<input type="text" name="facebook" id="" class="form-control" placeholder="Twitter Adresi" value="<?php echo $data['facebook']; ?>">
						</div>
						<div class="form-group">
							<input type="text" name="twitter" id="" class="form-control" placeholder="Facebook Adresi" value="<?php echo $data['twitter']; ?>">
						</div>
						<div class="form-group">
							<input type="text" name="instagram" id="" class="form-control" placeholder="Instagram Adresi" value="<?php echo $data['instagram']; ?>">
						</div>
						<div class="form-group">
							<input type="text" name="youtube" id="" class="form-control" placeholder="Youtube Adresi" value="<?php echo $data['youtube']; ?>">
						</div>
						<div class="form-group">
							<input type="submit" name="updateabout" id="submit" class="btn btn-success btn-block" value="Güncelle">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- jQuery -->
<script src="bootstrap/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>



<script src="../ckeditor/ckeditor.js"></script>
<script>
	CKEDITOR.replace('editor1');
</script>