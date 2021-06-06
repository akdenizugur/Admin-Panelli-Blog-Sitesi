<?php
include "db.php";

/*function users_online()
{
  global $connection;

  $session = session_id();
  $time = time();
  $time_out_in_seconds = 5;
  $time_out = $time - $time_out_in_seconds;

  $query = "SELECT * FROM users_online WHERE session = '$session'";
  $result = mysqli_query($connection, $query);
  $count = mysqli_num_rows($result);

  if ($count == NULL)
    mysqli_query($connection, "INSERT INTO users_online(session,time) VALUES ('$session',$time)");
  else
    mysqli_query($connection, "UPDATE users_online SET time = $time WHERE session = '$session'");
  $query = "SELECT * FROM users_online WHERE time > $time_out";
  $result = mysqli_query($connection, $query);
  $count_user = mysqli_num_rows($result);
  return $count_user;
}
*/


function add_category()
{
  global $connection;

  if (isset($_POST['cat_add'])) {
    if (empty($_POST['cat_title'])) {
      header("Location: ../categories.php?Field_cannot_be_empty");
    } else {
      $cat_title = $_POST['cat_title'];
      $query = "INSERT INTO categories(cat_title)VALUES('$cat_title')";
      $result = mysqli_query($connection, $query);

      if (!$result) {
        die("Veri gönderilemedi " . mysqli_error($connection));
      } else {
        header("Location: ../categories.php?category_added");
      }
    }
  }
}
add_category();

function show_category()
{
  global $connection;
  $query = "SELECT * FROM categories";
  $result = mysqli_query($connection, $query);

  while ($row = mysqli_fetch_assoc($result)) {
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];

    echo "<tr>";
    echo "<td>{$cat_id}</td>";
    echo "<td>{$cat_title}</td>";
    echo "<td><a href='categories.php?delete_cat={$cat_id}'>Sil</a></td>";
    echo "</tr>";
  }
}

function delete_category()
{
  global $connection;
  if (isset($_GET['delete_cat'])) {
    $cat_id = $_GET['delete_cat'];
    $query = "DELETE FROM categories WHERE cat_id = $cat_id";
    $result = mysqli_query($connection, $query);
    if (!$result) {
      die("Veri gönderilemedi " . mysqli_error($connection));
    } else {
      header("Location: categories.php?category_deleted");
    }
  }
}
delete_category();


function show_posts()
{
  global $connection;

  $result = mysqli_query($connection, "SELECT * FROM posts LIMIT 100");

  while ($row = mysqli_fetch_assoc($result)) {
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_category = $row['post_category'];
    $post_content = substr($row['post_content'], 0, 50);
    $post_tags = $row['post_tags'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $date = $row['post_date'];
    echo "<tr>";
    echo "<td>{$post_id}</td>";
    echo "<td>{$post_title}</td>";
    echo "<td>{$post_author}</td>";
    echo "<td>{$post_category}</td>";
    echo "<td>{$post_status}</td>";
    echo "<td><img src='{$post_image}' width='50px'></td>";
    echo "<td>{$post_content}</td>";
    echo "<td>{$date}</td>";
    echo "<td>{$post_tags}</td>";
    echo "<td><a href='posts.php?approve_post=$post_id' class='btn btn-success'>Durumu Değiştir</a></td>";
    echo "<td><a href='posts.php?source=edit&edit_post=$post_id' class='btn btn-primary'>Düzenle</a></td>";
    echo "<td><a href='posts.php?delete_post=$post_id' class='btn btn-danger'>Sil</a></td>";
    echo "</tr>";
  }
}


function show_slider()
{
  global $connection;

  $result = mysqli_query($connection, "SELECT * FROM slider LIMIT 100");

  while ($row = mysqli_fetch_assoc($result)) {
    $slider_id = $row['slider_id'];
    $slider_title = $row['slider_title'];
    $slider_status = $row['slider_status'];
    $slider_image = $row['slider_image'];
    echo "<tr>";
    echo "<td>{$slider_id}</td>";
    echo "<td>{$slider_title}</td>";
    echo "<td>{$slider_status}</td>";
    echo "<td><img src='{$slider_image}' width='50px'></td>";
    echo "<td><a href='slider.php?approve_slider=$slider_id' class='btn btn-success'>Durumu Değiştir</a></td>";
    echo "<td><a href='slider.php?source=edit&edit_slider=$slider_id' class='btn btn-primary'>Düzenle</a></td>";
    echo "<td><a href='slider.php?delete_slider=$slider_id' class='btn btn-danger'>Sil</a></td>";
    echo "</tr>";
  }
}

//publish or draft post
function modifyStatus($id)
{
  global $connection;
  $query = mysqli_query($connection, "SELECT post_status FROM posts WHERE post_id=$id");
  if (mysqli_num_rows($query) > 0) {
    $result = mysqli_fetch_array($query);
    $status = $result['post_status'];

    if ($status == "draft") {
      $query = mysqli_query($connection, "UPDATE posts SET post_status='published' WHERE post_id=$id");
    } else {
      $query = mysqli_query($connection, "UPDATE posts SET post_status='draft' WHERE post_id=$id");
    }
    return true;
  } else {
    return false;
  }
}



function show_contact()
{
  global $connection;

  $result = mysqli_query($connection, "SELECT * FROM contact LIMIT 100");

  while ($row = mysqli_fetch_assoc($result)) {
    $contact_id         = $row['contact_id'];
    $contact_name       = $row['contact_name'];
    $contact_surname    = $row['contact_surname'];
    $contact_email      = $row['contact_email'];
    $contact_message    = $row['contact_message'];
    $contact_date       = $row['contact_date'];
    $contact_ip         = $row['contact_ip'];

    echo "<tr>";
    echo "<td>{$contact_id}</td>";
    echo "<td>{$contact_name}</td>";
    echo "<td>{$contact_surname}</td>";
    echo "<td>{$contact_email}</td>";
    echo "<td>{$contact_message}</td>";
    echo "<td>{$contact_date}</td>";
    echo "<td>{$contact_ip}</td>";
    echo "</tr>";
  }
}
