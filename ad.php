<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    $role = $_SESSION['role_id'];
    if ($role < 3){
        header("Location: login.html");
    }
?>

<head>
    <title>Administer</title>
    <meta charset="utf-8">
    <meta name="description" content="for login">
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
    <link href="css/admin-css.css" rel="stylesheet" />
    <link href="css/landing-page.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet" />
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
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
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
                  <li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown">Manage User<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="ad.php">Manage User</a></li>
                        <li><a href="ad-course.php">Course</a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown"><div><img src="img/CircledUser.png" alt="" style="height:23px;"><label id=role-dropdown>Administer</label><b class="caret"></b></div></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Edit Password</a></li>
                            <li><a href="controller/kill_session.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <div class="content-section-b">
        <div class="container">
            <h2>Manage User</h2>
            <br />
            <!-- <input type="text" class="search-query form-control search-css" placeholder="Search" /> -->
            <ul class="list-inline intro-social-buttons">
                <li>
                    <a href="" class="btn-admin" onclick=resetForm() data-toggle="modal" data-target="#myModal"><i><img src="img/AddUser.png" alt="" style="height:23px;"></i><span class="network-name">    CREATE NEW USER</span></a> &nbsp;&nbsp;
                </li>
                <li>
                    <a href="" class="btn-admin" data-toggle="modal" data-target="#CSVModal"><i><img src="img/AddFile-64.png" alt="" style="height:23px;"></i><span class="network-name">    UPLOAD USER (CSV)</span></a>&nbsp;&nbsp;
                </li>
                <li>
                    <a href="" class="btn-admin" onclick="popUp()"><i><img src="img/Print-64.png" alt="" style="height:23px;"></i><span class="network-name">    PRINT TO PDF</span></a>&nbsp;&nbsp;
                </li>
            </ul>
             <div id='table'>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#login">Administer</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#about">Top</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; Your Company 2014. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Modal -->
    <form class="" action="index.html" method="post">
        <div id="deleteModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><img src="img/Delete-50.png" alt="" style="height:30px;"> Upload Course(CSV)</h4>
                    </div>
                    <div class="modal-body">
                        <p style="color:red; text-align:center;">
                            Do you want to Delete Record ?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id=model-del class="btn btn-default" data-dismiss="modal">Submit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    </form>


    <!-- Modal -->
    <form class="" action="index.html" method="post">
        <div id="editModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" >&times;</button>
                        <h4 class="modal-title"><img src="img/Edit-50.png" alt="" style="height:25px;">  Edit user information </h4>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                          <label for="usr">Username ID:</label>
                          <input type="text" class="form-control" id="usr" disabled="true">
                      </div>
                      <div class="form-group">
                          <label for="firstname">Firstname:</label>
                          <input type="text" class="form-control" id="firstname">
                      </div>
                      <div class="form-group">
                          <label for="lastname">Lastname:</label>
                          <input type="text" class="form-control" id="lastname">
                      </div>
                      <div class="form-group">
                          <label for="role">Role:</label>
                          <select class="form-control" id="role">
                                <option value="1">Student</option>
                                    <option value="2">Teacher</option>
                                    <option value="3">Laboratory-Teacher</option>
                                    <option value="4">Admin</option>
                          </select>
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

    <!-- Modal -->
    <form class="" action="index.html" method="post">
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><img src="img/AddUser.png" alt="" style="height:30px;"> Create new user</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="usr">Username ID:</label>
                            <input type="text" id="userid_create"class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="firstname">Firstname:</label>
                            <input type="text" id="fname_create" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Lastname:</label>
                            <input type="text" id="lname_create"class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="role-create">Role:</label>
                            <select id="role_create" class="form-control">
                                    <option value="1">Student</option>
                                    <option value="2">Teacher</option>
                                    <option value="3">Laboratory-Teacher</option>
                                    <option value="4">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button  type="submit" id="modal-createUser" class="btn btn-default"  data-dismiss="modal" >Submit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    </form>

    <!-- Modal -->
    <form class="" action="index.html" method="post">
        <div id="CSVModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><img src="img/AddFile-64.png" alt="" style="height:30px;"> Upload Course(CSV)</h4>
                    </div>
                    <div class="modal-body center-content">
                        <p>
                            Choose CSV of <i><u>user-data</u></i> for upload to create new Users.
                        </p>
                        <div>
                          <input type="file" class="file form-control-file btn btn-default" style="width:100%; text-align:center;">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default" data-dismiss="modal">Submit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    </form>

<input type="text" id="username" hidden />
<input type="text" id="fname" hidden />
<input type="text" id="lname" hidden />
<input type="text" id="role_id" hidden />
<input type="text" name="email" id="email" hidden>
<input type="text" name="address" id="address" hidden>
<input type="text" name="tel" id="tel" hidden>

</body>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>


    <!-- GenPass -->
    <script src="js/sha1.js"></script>
    <script src="js/passwordController.js"></script>

    <!-- guitar -->
    <script src="js/guitar-ad.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- mint -->
    <script src="js/mint-alertbox.js"></script>

    <script>
        $(document).ready(function() {
            $('#username').val('<?php echo $_SESSION['username'];?>');
            $('#fname').val('<?php echo $_SESSION['fname'];?>');
            $('#lname').val('<?php echo $_SESSION['lname'];?>');
            $('#role_id').val('<?php echo $_SESSION['role_id'];?>');
            $('#email').val('<?php echo $_SESSION['email'];?>');
            $('#address').val('<?php echo $_SESSION['address'];?>');
            $('#tel').val('<?php echo $_SESSION['tel'];?>');
        });
    </script>

</html>
