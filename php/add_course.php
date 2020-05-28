<?php
  session_start();
  $username = $_SESSION['valid_user'];

  $cname      = trim( preg_replace("/\t|\R/",' ',$_POST['course_name']) );

  require_once('grade_fns.php');
  $conn = db_connect();
  $q = "insert into course
               values (?, ?)";
  $stmt = $conn->prepare($q);
  $stmt->bind_param('ss', $cname, $username);
  $stmt->execute();

  require_once('display.php');

 ?>
