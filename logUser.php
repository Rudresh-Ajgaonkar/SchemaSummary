
<?php
session_start();
  include 'db_connect.php';
// Check connection
  $date1 = new DateTime('now', new DateTimeZone('America/Chicago'));
  $date = $date1->format('m-d-Y');
  $time = $date1->format('H:i:s');
  $uid = $_SESSION['uid'];
  if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
  }

  $sql = "Insert into userinfo(userid,startdate,starttime) values('$uid','$date','$time')";
  $result = mysqli_query($conn , $sql);
  ?>
