

<?php

include 'includes/db.php';

if (isset($_POST['send'])) {
  $contact_name      = (trim($_POST["contact_name"]));
  $contact_surname   = (trim($_POST["contact_surname"]));
  $contact_email     = (trim($_POST["contact_email"]));
  $contact_message   = (trim($_POST["contact_message"]));
  $contact_date      = (trim(date("d.m.Y")));
  $contact_ip        = (trim($_SERVER['REMOTE_ADDR']));





  if ($contact_name == "" or $contact_surname == "" or $contact_email == "" or $contact_message == "") {
    echo "<script type='text/javascript'>
alert('Lütfen Tüm Alanları Doldurun.');
window.location.href='contact.php'; 
</script>";
  } else {
    $query = "INSERT INTO contact(contact_name,contact_surname,contact_email,contact_message,contact_date,contact_ip)values('$contact_name','$contact_surname','$contact_email','$contact_message','$contact_date','$contact_ip')";
    $result = mysqli_query($connection, $query);
    header("Location: contact.php");
  }
}

?>