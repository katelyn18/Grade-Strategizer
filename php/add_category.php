<?php
  session_start();
  $username = $_SESSION['valid_user'];
  $course = $_POST['course_name'];
  $category = $_POST['category_name'];
  $weight = $_POST['weight'];

  require_once('grade_fns.php');
  $conn = db_connect();
  $q = "insert into category
               values (?, ?, ?, ?)";
  $stmt = $conn->prepare($q);
  $stmt->bind_param('ssss', $category, $weight, $course, $username);
  $stmt->execute();

  require_once('display.php');
 ?>

 
