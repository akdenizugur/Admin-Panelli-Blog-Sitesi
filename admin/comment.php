<?php 
include 'includes/header.php'; 
include 'includes/helper.php';
// delete comment 
if(isset($_GET['del_com']) && $_GET['del_com'] !== '') {
  $d_id = $_GET['del_com'];
  if(delete('comments','id', $d_id)) {
    header("Location: comment.php");
  }
}
// approve comment
if(isset($_GET['un']) && $_GET['un'] !== '') {
  $un = $_GET['un'];
  if(confirm($un)) {
    header("Location: comment.php");
  }
}

// unapprove comment
if(isset($_GET['app']) && $_GET['app'] !== '') {
  $un = $_GET['app'];
  if(confirm($un)) {
    header("Location: comment.php");
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
                    <div class="col-lg-12">
                          <h1 class="page-header">
                            Admin Paneline Hoş Geldiniz..
                        </h1>
                        <div class="table-responsive">
                          <table class="table table-striped table-hover table-bordered">
                            <thead>
                              <th>ID</th>
                              <th>İsim</th>
                              <th>Email</th>
                              <th>Mesaj</th>
                              <th>Durum</th>
                              <th>Post ID</th>
                              <?php if($role === "Admin"){
                                echo '<th colspan="3" class="text-center">İşlemler</th>';
                              } ?>

                            </thead>
                            <tbody>
                              <?php
                                require '../classes/Comment.php';
                                $comment_obj = new Comment($connection);
                                $comment_obj->getComments();
                              ?>
                            </tbody>
                          </table>
                        </div>
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
