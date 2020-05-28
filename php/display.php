<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="../image/png" sizes="16x16" href="../images/favicon.ico">
    <title>Grade Strategizer</title>
    <!-- Bootstrap Core CSS -->
    <link href="../plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="../css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="dashboard.html">
                        <!-- Logo icon -->
                        <b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="../images/favicon.ico" alt="homepage" class="dark-logo" />

                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>
                            <!-- dark Logo text -->
                            <img src="../images/logo-text2.png" alt="homepage" class="dark-logo" />
                        </span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0 ">
                        <!-- This is  -->

                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item dropdown">
                             <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">User</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li>
                            <a href="dashboard.html" class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="../html/pages-profile.html" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Profile</a>
                        </li>
           <li>
                            <a href="../html/about.html" class="waves-effect"><i class="fa fa-columns m-r-10" aria-hidden="true"></i>About</a>
                        </li>
           <li>
                            <a href="../html/help.html" class="waves-effect"><i class="fa fa-columns m-r-10" aria-hidden="true"></i>Help</a>
                        </li>
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                    </div>

                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->

        <?php
          require_once('db_fns.php');
          $conn = db_connect();
          $query = "select courseName
                    from course
                    where user = '".$username."'";
          $result = $conn->prepare($query);
          $result->execute();
          $result->store_result();
          $result->bind_result($Course_Name);

          $course_style = 'style="width: 100%; vertical-align:top; border:1px solid black; background: dodgerblue; font-weight: bold;"';
          $category_style = 'style = "width:60%; vertical-align:top; border:1px solid black; background: deepskyblue; font-weight: bold;"';
          $weight_style = 'style = "width:40%; vertical-align:top; border:1px solid black; background: deepskyblue; font-weight: bold;"';
          $table_style = 'style="width: 100%; border:1px solid black; border-collapse:collapse;"';
          $fmt_style = 'style="vertical-align:top; border:1px solid black; font-weight: bold; background: lightskyblue;"';
          $assign_style = 'style="vertical-align:top; border:1px solid black; background: lightblue;"';
          $elt_style = 'style="vertical-align:top; border:1px solid black;"';
          $row_number = 0;

          echo "Number of Courses: ".$result->num_rows."<br/>\n";

          //echo "       <table $table_style>\n";
          while($result->fetch())
          {
            echo "       <table $table_style>\n";
            echo "        <tr>\n";
            echo "          <th $course_style>".$Course_Name."</th>\n";
            echo "        </tr>\n";

            $query2 = "select categoryName, weight
                       from category
                       where course = ? and user = ?";
            $result2 = $conn->prepare($query2);
            $result2->bind_param('ss', $Course_Name, $username);
            $result2->execute();
            $result2->store_result();
            $result2->bind_result($Category_Name, $Category_Weight);

            echo "        <tr>\n";
            echo "          <th $category_style>Category Name</th>\n";
            echo "          <th $weight_style>Category Weight</th>\n";
            echo "        </tr>\n";

            while($result2->fetch()){
              echo "        <tr>\n";
              echo "          <td $fmt_style>".$Category_Name."</td>\n";
              echo "          <td $fmt_style>".$Category_Weight."%</td>\n";
              echo "        </tr>\n";

              $query3 = "select assignmentName, score
                         from assignment
                         where category = ? and course = ? and user = ?";
              $result3 = $conn->prepare($query3);
              $result3->bind_param('sss', $Category_Name, $Course_Name, $username);
              $result3->execute();
              $result3->store_result();
              $result3->bind_result($Assignment_Name, $Assignment_Score);

              echo "        <tr>\n";
              echo "          <th $assign_style>Assignment</th>\n";
              echo "          <th $assign_style>Score</th>\n";
              echo "        </tr>\n";

              while($result3->fetch()){
                echo "        <tr>\n";
                echo "          <td $elt_style>".$Assignment_Name."</td>\n";
                echo "          <td $elt_style>".$Assignment_Score."</td>\n";
                echo "        </tr>\n";
              }
              display_assignment_button($Course_Name, $Category_Name);
              // echo "      <br/>\n";
              // echo "      <br/>\n";
            }
            //if ($result1->num_rows()==0) {echo "no categories";}
            //echo "        </tr>\n";
            echo "       </table>\n";
            echo "      <br/>\n";
            display_category_button($Course_Name);
            // echo "      <br/>\n";
            // echo "      <br/>\n";
          }
          //echo "       </table>\n";
            display_course_button();

         ?>


        <?php
        function display_course_button() {
        ?>

        <!-- <button type="button" class="btn btn-default btn-circle btn-lg"><i class="glyphicon glyphicon-ok"></i></button> -->
       <button id="coBtn">Add Course</button>

       <!--COURSE MODAL-->
                <!-- The Modal -->
                <div id="coModal" class="comodal">
                  <!-- Modal content -->
                  <div class="co-modal-content">
                    <span class="close">&times;</span>
        <form method = "post" action="add_course.php">
           <input type="text" name="course_name" id="course_name" placeholder="Course Name"><br>
           <p id="error"></p> <!-- makes sure user inputs something-->
           <div class="course_butn"><button id="co-ok">Ok</button></div>
                  </div>
                </div>
        </form>

        <?php
        }

        function display_category_button($Course_Name){
        ?>
        <h style="font-weight: bold;">Add Category</h><br>
          <!-- <div id="caModal" class="camodal"> -->
            <!-- <div class="popUpList"> -->
              <!-- <span class="close">&times;</span> -->
              <form method="post" action="add_category.php">
                <?php echo "    <input type='hidden' name='course_name' id='course_name' value='$Course_Name'>"    ?>
                  Category Name: <input type="text" name="category_name" id="category_name" value=""><br>
                  Category Weight: <input type="text" name="weight" id="weight" value=""><br/>
                  <p id="error"></p>
                  <div class="category_butn"><button id="ca-ok">Ok</button></div>
                </form>
            <!-- </div> -->
          <!-- </div> -->
        <?php
        }

        function display_assignment_button($Course_Name, $Category_Name){
        ?>
        <tr><td>
          <h style="font-weight: bold;">Add Assignment</h><br>
                <form method="post" action="add_assignment.php">
                  <?php echo "    <input type='hidden' name='course_name' id='course_name' value='$Course_Name'>";
                        echo "    <input type='hidden' name='category_name' id='course_name' value='$Category_Name'>";
                  ?>
                    Assignment Name: <input type="text" name="assignment_name" id="category_name" value=""><br>
                    Assignment Score: <input type="text" name="assignment_score" id="assignment_score" value=""><br/>
                    <p id="error"></p>
                    <div class="assi_butn"><button id="assi-ok">Ok</button></div>
                  </form>
        <td/></tr>
        <?php
          }
        ?>

       <div id="myCourses">
<!--
         <div class="courses" id="course">

           <h3>Test Course</h3>
           <button class="cat" id="test" onclick="cat_clicked(this.id)" >New Category</button>


           <div class="category" id=1>
             <h4>Test Category</h4>
             <button id="assi_test" onclick="assi_clicked(this.id)">New Assignment</button>
           </div>


         </div>
-->
       </div>


       </div>

                <!-- Row -->

                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                © 2017 Monster Admin by wrappixel.com
       https://wrappixel.com/templates/monster-admin-lite/
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../plugins/bootstrap/js/tether.min.js"></script>
    <script src="../plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="../js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="../js/custom.min.js"></script>
 <!--MY JAVASCRIPT-->
 <script src="../js/myScript.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- Flot Charts JavaScript -->
    <script src="../plugins/flot/jquery.flot.js"></script>
    <script src="../plugins/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="../js/flot-data.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
