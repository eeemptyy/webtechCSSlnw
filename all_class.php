<!DOCTYPE html>
<html lang="en">

<?php
  session_start();
  $role = $_SESSION['role_id'];
?>

    <head>
        <title>All History Class</title>
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
                                <li><a href="ChangePW.php">Edit Password</a></li>
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
              <label class="title-text" style="text-align:left;">ALL CLASS HISTORY</label>
              <br /><br /><br />
              <div id="link-all-class">

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
                            <li><a href="">History</a></li>
                        </ul>
                        <p class="copyright text-muted small">Copyright &copy; Your Company 2014. All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </footer>

        <script src="js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/AllHistoryClass.js"></script>


    </body>
</html>
