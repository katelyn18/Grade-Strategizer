<?php
  session_start();
  $username = $_SESSION['valid_user'];
  $course = $_POST['course_name'];
  $category = $_POST['category_name'];
  $assignment = $_POST['assignment_name'];
  $score = $_POST['assignment_score'];


  require_once('grade_fns.php');
  $conn = db_connect();
  $q = "insert into assignment
               values (?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($q);
  $stmt->bind_param('sssss', $assignment, $score, $category, $course, $username);
  $stmt->execute();

  require_once('display.php');
 ?>
