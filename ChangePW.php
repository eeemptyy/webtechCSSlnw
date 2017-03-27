<!DOCTYPE html>
<html lang="en">

<?php
  session_start();
  $role = $_SESSION['role_id'];
?>

    <head>
        <title>Edit Password</title>
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
                                <li><a href="edit_user.php">Edit Profile</a></li>
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
                <label class="title-text">- Edit Password -</label>
                <br /><br /><br />
                  <div style="padding-right:20%; padding-left:20%">
                    <div class="form-group">
                        <label for="usr">Present Password:</label>
                        <input type="password" class="form-control" id="oldPass" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="firstname">New Password:</label>
                        <input type="password" class="form-control" id="newPass1" placeholder="Password" >
                    </div>
                    <div class="form-group">
                        <label for="lastname">Re-Password:</label>
                        <input type="password" class="form-control" id="newPass2" placeholder="Password">
                    </div>
                    <br />
                    <div class="form-group">
                        <input id="submitChangPws" class="btn btn-primary btn-qr btn-block" style="color:black; border:1px solid rgb(139, 134, 134);" type="submit" value="Submit">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary btn-qr btn-block" style="background:white; color:black; border:1px solid rgb(139, 134, 134);" type="reset" value="Cancel" onclick="goBack()">


                    </div>

                    </div>
                  </div>

            </div>
        </div>
        </div>

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
    		<!-- jQuery -->
    		<script src="http://code.jquery.com/jquery.js"></script>
    		<!-- Bootstrap JavaScript -->
    		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

    		<script>
    			$(document).ready(function() {
    	            $('#username').val('<?php echo $_SESSION['username']; ?>');
    			});
    			function goBack() {

        			window.history.back();
                    // window.location.replace("student_profile.php")
    			}
    	  </script>
        <!-- <script src="js/jquery.js"></script> -->
        <!-- Bootstrap Core JavaScript -->
        <!-- <script src="js/bootstrap.min.js"></script> -->

     		<!-- mint -->
     		<script src="js/changePws.js"></script>

     		<!-- Password encryption part -->
        <script src="js/sha1.js"></script>
        <script src="js/passwordController.js"></script>

    </body>
</html>
