<?php 
include('asteroid-admin/includes/connection.php');

date_default_timezone_set('Asia/Calcutta');
$date = date("Y-m-d");

if(isset($_POST['submit'])){

 $name=mysqli_real_escape_string($db,$_POST['name']);
 $email=mysqli_real_escape_string($db,$_POST['email']);
 $message=mysqli_real_escape_string($db,$_POST['message']);

mysqli_query($db,"INSERT INTO `contact_details`(`name`, `email`, `query`, `created_date`) VALUES ('$name','$email','$message','$date')");
echo '<script>window.location="contact-us.php?status=success"</script>';
  }
else
  {
echo '<script>window.location="contact-us.php?status=error"</script>';
  }

?>