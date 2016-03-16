<?php
  session_start();
  include 'db_connect.php';
// generate random number
  $qid = $_POST['questionNo'];
  $answer = $_POST['answerValue'];
  $x = $_POST['x'];
  $comments = $_POST['m'];
  $sessionVar = $_SESSION['uid'];
  $sql = "Insert into qaResults(qid, answer, timeTaken, userid, comments) values('$qid','$answer','$x','$sessionVar','$comments')";
  $result = mysqli_query($conn , $sql);
  ?>
