<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    $role = $_SESSION['role_id'];
    if ($role < 1){
        header("Location: login.html");
    }
?>



    <head>
        <title>Comment</title>
        <meta charset="utf-8">
        <meta name="description" content="change password page">
        <meta name="keywords" content="HTML, CSS, JavaScript">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="th">
        <meta http-equiv="content-Type" content="text/html; charset=tis-620">
        <meta http-equiv="content-Type" content="text/html; charset=window-874">

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Pacifico" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/generateQR-css.css" rel="stylesheet">
        <link href="css/comment-css.css" rel="stylesheet">
        <link href="css/landing-page.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>

    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
            <div class="container topnav">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" style="width" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                    <a class="navbar-brand topnav classwork" href="">ClassWork</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <!-- <li>Course</li> -->
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                <div><img src="img/CircledUser.png" alt="" style="height:23px;"><label id=role-dropdown>Student</label><b class="caret"></b></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="">Edit Profile</a></li>
                                <li><a href="">Edit Password</a></li>
                                <li><a href="controller/kill_session.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <br /><br />
        <div class="content-section-b">
            <div class="container">
              <label class="title-text" style="text-align:left;">01418116 Computer Programming</label>
              <br /><br />
              <div class="row">
                <div class="student-box col-sm-4">
                  <label class="name" id="usr_id">5610404452</label><br />
                  <label class="name" id="firstname">Boonyaporn</label>&nbsp;&nbsp;&nbsp;&nbsp;<lable class="name" id="lastname">Narkjumrussri</lable><br />
                  <label class="name">Grade</label>&nbsp;&nbsp;&nbsp;&nbsp;<lable class="name" id="lastname">NULL</lable><br />
                  <div class="form-group">
                      <input id="submitChangPws" class="btn btn-default" style="font-size:12px; color:black; float:right;" type="submit" value="Update Grade" data-toggle="modal" data-target="#myModal">
                  </div>
                </div>

                <div class="student-box col-sm-8">
                  <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea class="form-control" rows="3" id="comment" placeholder="Comment here..."></textarea>
                  </div>
                  <div class="form-group">
                      <input id="submitChangPws" class="btn btn-default" style="font-size:12px; color:black; float:right;" type="submit" value="Comment">
                  </div>
                </div>
              </div>
              <br /><hr /><br />



            <div id="all_comment">
                <div class="student-box" id="student-box"style="width:100%; background:rgba(189, 167, 141, 0.74); height:auto; padding-button:20px;">
                  <div class="form-group">
                    <label for="comment"><b><u>Sukumal :</u></b></label>
                    <p style="margin-left:30px;">
                      Comments
                    </p>
                  </div>
                  <div class="form-group">
                      <input id="submitChangPws" class="btn btn-default" style="font-size:12px; color:black; float:right;" type="button" value="Delete">
                  </div>
                  <br />
              </div>
            </div>

            <div id="all_comment">
<!--                <div class="student-box" style="width:100%; background:rgba(189, 167, 141, 0.74); height:auto; padding-button:20px;">-->
<!--
                  <div class="form-group">
                    <label for="comment"><b><u>Sukumal :</u></b></label>
                    <p style="margin-left:30px;">
                      Comments
                    </p>
                  </div>
                  <div class="form-group">
                      <input id="submitChangPws" class="btn btn-default" style="font-size:12px; color:black; float:right;" type="button" value="Delete">
                  </div>
                  <br />
-->
              </div>
            </div>


            </div>
        </div>
        </div>

        <!-- Modal -->
        <form class="" action="index.html" method="post">
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" >&times;</button>
                            <h4 class="modal-title"><img src="img/Edit-50.png" alt="" style="height:25px;">  Edit user information </h4>
                        </div>
                        <div class="modal-body">
                          <div class="form-group">
                              <label for="usr">Student ID:</label>
                              <input type="text" class="form-control" id="usr" disabled="true">
                          </div>
                          <div class="form-group">
                              <label for="firstname">Student Name:</label>
                              <input type="text" class="form-control" id="firstname" disabled="true">
                          </div>
                          <div class="form-group">
                              <label for="lastname">Grade:</label>
                              <input type="text" class="form-control" id="lastname">
                          </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id=model-editUser class="btn btn-default" data-dismiss="modal">Submit</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
        </form>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="list-inline">
                            <li><a href="">Home</a></li>
                            <li class="footer-menu-divider">&sdot;</li>
                            <li><a href="">Change Password</a></li>
                        </ul>
                        <p class="copyright text-muted small">Copyright &copy; Your Company 2014. All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </footer>

<input type="text" id="username" hidden />
<input type="text" id="fname" hidden />
<input type="text" id="lname" hidden />
<input type="text" id="role_id" hidden />
<input type="text" name="email" id="email" hidden>
<input type="text" name="address" id="address" hidden>
<input type="text" name="tel" id="tel" hidden>
<input type="text" name="year" id="year" hidden>
<input type="text" name="course_id" id="course_id" hidden>
<input type="text" name="semester" id="semester" hidden>

    </body>

        <script src="js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <script>
        $(document).ready(function() {
            $('#username').val('<?php echo $_SESSION['username'];?>');
            $('#fname').val('<?php echo $_SESSION['fname'];?>');
            $('#lname').val('<?php echo $_SESSION['lname'];?>');
            $('#role_id').val('<?php echo $_SESSION['role_id'];?>');
            $('#email').val('<?php echo $_SESSION['email'];?>');
            $('#address').val('<?php echo $_SESSION['address'];?>');
            $('#tel').val('<?php echo $_SESSION['tel'];?>');
            
            $('#year').val('<?php echo $_GET['year']; ?>');
            $('#course_id').val('<?php echo $_GET['course']; ?>');
            $('#semester').val('<?php echo $_GET['semester']; ?>');
            
            $('#firstname').html($('#fname').val());
            $('#lastname').html($('#lname').val());

        });
    </script>
    <script src="js/comment.js"></script>

</html>
