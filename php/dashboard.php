
<!DOCTYPE html>
<?php

  // include function files for this application
  require_once('grade_fns.php');
  session_start();

  //create short variable names
  if (!isset($_POST['username']))  {
    //if not isset -> set with dummy value
    $_POST['username'] = " ";
  }
  $username = $_POST['username'];
  if (!isset($_POST['passwd']))  {
    //if not isset -> set with dummy value
    $_POST['passwd'] = " ";
  }
  $passwd = $_POST['passwd'];

  if ($username && $passwd) {
  // they have just tried logging in
    try  {
      login($username, $passwd);
      // if they are in the database register the user id
      $_SESSION['valid_user'] = $username;
    }
    catch(Exception $e)  {
      // unsuccessful login
      //do_html_header('Problem:');
      echo 'You could not be logged in.<br>
            You must be logged in to view this page.';
      do_html_url('../index.html', 'Login');
      //do_html_footer();
      exit;
    }
  }

  // do_html_header('Home');
  check_valid_user();


  // // get the courses this user has saved
  // if ($stmt = get_user_courses($_SESSION['valid_user'])) {
  //   display_user_courses($stmt);
  // }

  require_once('display.php');

?>
