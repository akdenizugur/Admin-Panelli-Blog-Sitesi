<?php 
include 'includes/header.php';
include "includes/helper.php";

// add slider
if (isset($_POST['publish'])) {
	$slider_title = $_POST['title'];
	//get the cat_id from db
	$slider_status = $_POST['status'];
	if (isset($_FILES['slider_image'])) {
		$dir = "../images/banner";
		$target_file = $dir . basename($_FILES['slider_image']['name']);
		if (move_uploaded_file($_FILES['slider_image']['tmp_name'], $target_file)) {
			$query = "INSERT INTO slider (slider_title,slider_image,slider_status) VALUES
            ('$slider_title','$target_file','$slider_status')";
			$result = mysqli_query($connection, $query);
			if (!$result) {
				die("Could not send data " . mysqli_error($connection));
				// header("Location: ../slider.php?source=add_new");
			} else {
				header("Location: slider.php?source=");
			}
		} else {
			echo "Resim Yüklenirken Bir Sorun Oluştu.";
		}
	}
}

//delete slider
if(isset($_GET['delete_slider']) && $_GET['delete_slider'] !== '') {
    $dlt = $_GET['delete_slider'];
    if(delete('slider','slider_id', $dlt)) {
      redirect('slider.php?source=');
    }else {
      die('Başarısız.');
    }
  }


  //approve slider
if(isset($_GET['approve_slider']) && $_GET['approve_slider'] !== "") {
	$app_id = $_GET['approve_slider'];
	if(modifyStatus($app_id)) {
		redirect('slider.php?source=');
	}else {
		die("Başarısız.");
	}
}
  //unapprove [slider]
  if(isset($_GET['unapprove_slider']) && $_GET['unapprove_slider'] !== "") {
	$app_id = $_GET['unapprove_slider'];
	if(modifyStatus($app_id)) {
		redirect('slider.php?source=');
	}else {
		die("Başarısız.");
	}
}

//update or modify content
if(isset($_POST['modify'])) {
	$eid = $_POST['editID'];
	$title = $_POST['title'];
	$status = $_POST['status'];
	$img = $_POST['image'];
	$slider_image = $_FILES['slider_image']['name'];
	$image = "";
	// check if user is uploading a new image
	if(isset($_FILES['slider_image']) && $slider_image != "") {
		$dir = "images/banner";
		$fileName = $_FILES['slider_image']['name'];
		$fileSize = $_FILES['slider_image']['size'];
		$fileTmpName = $_FILES['slider_image']['tmp_name'];
		$allowed = ['png','jpg','jpeg','gif'];
		$fileExt = explode('.', $fileName);
		$fileActExt = strtolower(end($fileExt));
		//check if image ext is allowed
		if(!in_array($fileActExt, $allowed)) {
			echo "<script>alert('Dosya Türü Kabul Edilmiyor.')</script>";
		}
		else if($fileSize > 10000000) {
			echo "<script>alert('Dosya Boyutu Çok Büyük!')</script>";
		}
		else {
			$newImage = uniqid("profilpic",true) . "." . $fileActExt;
			$target = $dir . basename($newImage);
			if(move_uploaded_file($fileTmpName, $target)) {
				$image = $target;
			}
		}
	} else {
		$image = $img;
	}

	$query = mysqli_query($connection, "UPDATE slider SET slider_title='$title',slider_status='$status',slider_image='$image' WHERE slider_id='$eid'");
	if($query) {
		header("Location: slider.php");
	}

	// echo "<script>alert('$eid')</script>";
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


					<?php
						if (isset($_GET['source'])) {
								$source = $_GET['source'];

						switch ($source) {
							case 'add_new':
								include "includes/add_slider.php";
								break;
							case 'edit':
								include "includes/edit_slider.php";
								break;
							default:
								include "includes/view_slider.php";
								break;
						}
		} else {
						include "includes/view_slider.php";
		}
					 ?>
</div>
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

</body>

</html>
