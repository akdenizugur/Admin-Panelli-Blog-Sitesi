<?php include 'includes/header.php';?>

    <div id="wrapper">

        <!-- Navigation -->
       <?php include 'includes/navigation.php'; ?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                        <h1 class="page-header">
                            Admin Paneline Hoş Geldiniz..
                        </h1>
					<div class="col-sm-6">
						<form action="includes/functions.php" method="post">
							<div class="form-group">
								<input type="text" name="cat_title" placeholder="Category Title" class="form-control">
							</div>
							<div class="form-group">
								<input type="submit" name="cat_add" value="Add Category" class="btn btn-primary">
							</div>
						</form>

						</div>
               	<div class="col-sm-6">
               <table class="table table-bordered table-striped table-hover">
                 <thead>
                   <th>Kategori ID</th>
                   <th>Kategori Başlığı</th>
                    <th>Sil</th>
                 </thead>
                 <tbody>
                   <?php show_category(); ?>
                 </tbody>
               </table>
						</div>
                <!-- /.row -->
            </div>
        </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
