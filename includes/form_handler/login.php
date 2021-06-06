<?php
session_start();
  $mysqli = new mysqli("localhost","root","","revive") or die("Could not connect");

if(isset($_POST['login_submit'])) {
  $email = $_POST['email'];
  $pwd = $_POST['pwd'];

  $sql = mysqli_query($mysqli, "SELECT * FROM users WHERE email='$email'");
  $row = mysqli_fetch_assoc($sql);
  $db_email = $row['email'];
  $db_pwd = $row['password'];
  $profile_pic = $row['profile_pic'];
  $username = $row['username'];

  $rehashpwd = md5($pwd);

  if($email === $db_email && $db_pwd === $rehashpwd) {
    $_SESSION['userLogged'] = $email;
    $_SESSION['profile_pic'] = $profile_pic;
    $_SESSION['username'] = $username;
    header("Location: ../../admin");
  }else{
    $_SESSION['log_email'] = $email;
    header("Location: ../../cms-admin.php?wrong_entries");
  }
}