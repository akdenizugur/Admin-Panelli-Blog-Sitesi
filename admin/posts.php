<?php 
include 'includes/header.php';
include "includes/helper.php";

// add post
if (isset($_POST['publish'])) {
	$post_title = $_POST['title'];
	$post_author = $_POST['author'];
	$post_category = $_POST['category'];
	//get the cat_id from db
	$sql = mysqli_query($connection, "SELECT cat_id FROM categories WHERE cat_title='$post_category'");
	$row = mysqli_fetch_array($sql);
	$post_category_id = $row['cat_id'];
	$post_content = mysqli_real_escape_string($connection, $_POST['content']);
	$post_tags = $_POST['tags'];
	$post_status = $_POST['status'];

	$date = date('d.m.Y H:i:s', strtotime('+1 hours'));;
	$post_views = 0;
	$post_comment_count = 0;

	if (isset($_FILES['post_image'])) {
		$dir = "../images/";
		$target_file = $dir . basename($_FILES['post_image']['name']);
		if (move_uploaded_file($_FILES['post_image']['tmp_name'], $target_file)) {
			$query = "INSERT INTO posts (post_title,post_author,post_category,post_category_id,post_content,post_image,post_date,post_comment_count,post_views,post_tags,post_status) VALUES('$post_title','$post_author','$post_category','$post_category_id','$post_content','$target_file','$date','$post_comment_count','$post_views','$post_tags','$post_status')";
			$result = mysqli_query($connection, $query);
			if (!$result) {
				die("Could not send data " . mysqli_error($connection));
				// header("Location: ../posts.php?source=add_new");
			} else {
				header("Location: posts.php?source=");
			}
		} else {
			echo "Resim Yüklenirken Bir Sorun Oluştu.";
		}
	}
}

//delete post
if(isset($_GET['delete_post']) && $_GET['delete_post'] !== '') {
    $dlt = $_GET['delete_post'];
    if(delete('posts','post_id', $dlt)) {
      redirect('posts.php?source=');
    }else {
      die('Başarısız.');
    }
  }


  //approve post
if(isset($_GET['approve_post']) && $_GET['approve_post'] !== "") {
	$app_id = $_GET['approve_post'];
	if(modifyStatus($app_id)) {
		redirect('posts.php?source=');
	}else {
		die("Başarısız.");
	}
}
  //unapprove [post]
  if(isset($_GET['unapprove_post']) && $_GET['unapprove_post'] !== "") {
	$app_id = $_GET['unapprove_post'];
	if(modifyStatus($app_id)) {
		redirect('posts.php?source=');
	}else {
		die("Başarısız.");
	}
}

//update or modify content
if(isset($_POST['modify'])) {
	$eid = $_POST['editID'];
	$title = $_POST['title'];
	$category = $_POST['category'];
	$author = $_POST['author'];
	$content = $_POST['content'];
	$tags = $_POST['tags'];
	$status = $_POST['status'];
	$img = $_POST['image'];
	$post_image = $_FILES['post_image']['name'];
	$image = "";
	// get post-cat-id
	$sql = mysqli_query($connection, "SELECT cat_id FROM categories WHERE cat_title='$category'");
	$record = mysqli_fetch_array($sql);
	$post_cat_id = $record['cat_id'];
	// check if user is uploading a new image
	if(isset($_FILES['post_image']) && $post_image != "") {
		$dir = "images/";
		$fileName = $_FILES['post_image']['name'];
		$fileSize = $_FILES['post_image']['size'];
		$fileTmpName = $_FILES['post_image']['tmp_name'];
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

	$query = mysqli_query($connection, "UPDATE posts SET post_title='$title', post_author='$author',post_category='$category', post_category_id='$post_cat_id',post_content='$content', post_status='$status',post_tags='$tags',post_image='$image' WHERE post_id='$eid'");
	if($query) {
		header("Location: posts.php");
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
								include "includes/add_post.php";
								break;
							case 'edit':
								include "includes/edit_post.php";
								break;
							default:
								include "includes/view_post.php";
								break;
						}
		} else {
						include "includes/view_post.php";
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
