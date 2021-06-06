<?php

(isset($_SESSION['userLogged'])) ? $user = $_SESSION['userLogged'] : $user = "user";
$sql = mysqli_query($connection, "SELECT * FROM users WHERE email='$user'");
$row = mysqli_fetch_array($sql);
$username = isset($row['username']);
$profile = isset($row['profile_pic']);
$role = isset($row['role']);


class Comment {
private $con;

public function __construct($con) {
$this->con = $con;
}

public function addComments($id, $name, $email, $body) {
if(!empty($body)) {
$query = mysqli_query($this->con, "INSERT INTO comments VALUES('','$name','$email','$body','Unapproved','$id');");
if(!$query) {
die("Failed " . mysqli_error($this->con));
}
}else{
return false;
}
}

public function getApprovedComments($id) {
    $query = mysqli_query($this->con, "SELECT * FROM comments WHERE post_id=$id AND status='Approved'");
    $str = "";
    while($row = mysqli_fetch_assoc($query)) {
    $id = $row['id'];
    $post_id = $row['post_id'];
    $name = $row['comment_name'];
    $body = $row['body'];
    ?>
    <h3><?php echo $name; ?></h3>
    <p><?php echo $body; ?></p>
<?php	}

}

public function getComments()
        {
            global $role;
            $query = mysqli_query($this->con, "SELECT * FROM comments ORDER BY id DESC LIMIT 20");
            $str = "";
            while ($row = mysqli_fetch_array($query))
            {
                $id = $row['id'];
                $name = $row['comment_name'];
                $body = $row['body'];
                $email = $row['comment_email'];
                $status = $row['status'];
                $post_id = $row['post_id'];
                if($role !== "Admin"){
                $str .= "<tr>
                                    <td>$id</td>
                                    <td>$name</td>
                                    <td>$email</td>
                                    <td>$body</td>
                                    <td>$status</td>
                                    <td>$post_id</td>
                                    <td><a href='comment.php?app=$id' class='btn btn-primary'>Göster</a></td>
                                            <td><a href='comment.php?un=$id' class='btn btn-warning'>Gizle</a></td>
                                            <td><a href='comment.php?del_com=$id' class='btn btn-danger'>Sil</a></td>
                                </tr>";
                    }else {
                        $str .= "<tr>
                                            <td>$id</td>
                                            <td>$name</td>
                                            <td>$email</td>
                                            <td>$body</td>
                                            <td>$status</td>
                                            <td>$post_id</td>
                                            <td><a href='comment.php?app=$id' class='btn btn-primary'>Göster</a></td>
                                            <td><a href='comment.php?un=$id' class='btn btn-warning'>Gizle</a></td>
                                            <td><a href='comment.php?del_com=$id' class='btn btn-danger'>Sil</a></td>
                                        </tr>";
                    }
            }
            echo $str;
        }
}