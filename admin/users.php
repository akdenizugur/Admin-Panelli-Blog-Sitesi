<?php include 'includes/header.php'; ?>

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
					<h3>Add Users</h3>
					<form action="validator/validate.php" method="POST" autocomplete="off" id="form">
						<div class="form-group">
							<input type="text" name="username" id="username" class="form-control" placeholder="Username">
						</div>
						<div class="form-group">
							<input type="email" name="email" id="email" class="form-control" placeholder="Email">
						</div>
						<div class="form-group">
							<input type="password" name="password" id="password" class="form-control" placeholder="Password">
						</div>
						<div class="form-group">
							<select name="role" id="role" class="form-control">
								<option value="Admin">Yönetici</option>
								<option value="Editor">Editör</option>
							</select>
						</div>
						<div class="form-group">
							<input type="submit" name="submit" id="submit" class="btn btn-success btn-block">
						</div>
						<p id="msg" class="text-center"></p>
					</form>
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