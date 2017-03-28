<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    $role = $_SESSION['role_id'];
    if ($role < 0){
        header("Location: login.html");
    }
?>
<head>
    <title>Edit User Profile</title>
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
    <link href="css/generateQR-css.css" rel="stylesheet" />
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

    <script type="text/javascript">
      //document.getElementById("username").value='test';
      //alert('test alert');
      //alert(document.getElementById("username").value);
    </script>

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
                      <a href="" class="dropdown-toggle" data-toggle="dropdown"><div><img src="img/CircledUser.png" alt="" style="height:23px;"><label id=role-dropdown>Student</label><b class="caret"></b></div></a>
                        <ul class="dropdown-menu">
                            <!-- <li><a href="#">Edit Profile</a></li> -->
                            <li><a href="change_pwd.php">Edit Password</a></li>
                            <li><a href="controller/kill_session.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="content-section-b">
        <div class="container">
          <div style="margin-top:50px; padding-right:20%; padding-left:20%;">
            <label class="title-text" style="margin-bottom:50px;">- Edit Profile -</label>
            <form action="" method="">
              <div class="form-group">
                  <label for="usr">Username ID:</label>
                  <input type="text" id="userid_create" class="form-control" disabled="true" >
              </div>
              <div class="form-group">
                  <label for="firstname">Firstname:</label>
                  <input type="text" id="fname_create" class="form-control">
              </div>
              <div class="form-group">
                  <label for="lastname">Lastname:</label>
                  <input type="text" id="lname_create" class="form-control">
              </div>
              <div class="form-group">
                  <label for="role-create">Role:</label>
                  <input type="text" id="role_id_create" class="form-control" disabled="true">
              </div>
              <div class="form-group">
                  <label for="role-create">Mobile Phone:</label>
                  <input type="text" id="tel_create" class="form-control">
              </div>
              <div class="form-group">
                  <label for="role-create">E-mail:</label>
                  <input type="text" id="email_create" class="form-control">
              </div>
              <div class="form-group">
                  <label for="role-create">Address:</label>
                  <input type="text" id="address_create" class="form-control">
              </div>
              <div class="form-group">
                  <button id='updateProfileBtn' type="submit" class="btn btn-primary btn-block btn-qr">Update Profile</button>
              </div>

          </div>
          </form>
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
        <div id="uploadModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><img src="img/Photos-50.png" alt="" style="height:30px;"> Upload Profile Picture</h4>
                    </div>
                    <div class="modal-body" style="height:500;">
                      <div class="input-group image-preview">
                        <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                        <span class="input-group-btn">
                  <!-- image-preview-clear button -->
                  <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                      <span class="glyphicon glyphicon-remove"></span> Clear
                  </button>
                  <!-- image-preview-input -->
                  <div class="btn btn-default image-preview-input">
                      <span class="glyphicon glyphicon-folder-open"></span>
                      <span class="image-preview-input-title">Browse</span>
                      <input type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview"/> <!-- rename it -->
                  </div>
              </span>
          </div><!-- /input-group image-preview [TO HERE]-->
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default" data-dismiss="modal">Submit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    </form>

    <!-- <script type="text/javascript"> alert(document.getElementById('username').value)</script> -->

    <input type="text" id="username" hidden />
    <input type="text" id="fname" hidden />
    <input type="text" id="lname" hidden />
    <input type="text" id="role_id" hidden />
    <input type="text" name="email" id="email" hidden/>
    <input type="text" name="address" id="address" hidden/>
    <input type="text" name="tel" id="tel" hidden/>
</body>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- mint send profile to DB -->
    <script src="js/editProfile.js"></script>

    <script>
        $(document).ready(function(){
        //get value from session
        $('#username').val('<?php echo $_SESSION['username']; ?>');
        $('#fname').val('<?php echo $_SESSION['fname']; ?>');
        $('#lname').val('<?php echo $_SESSION['lname']; ?>');
        $('#role_id').val('<?php echo $_SESSION['role_id']; ?>');
        $('#email').val('<?php echo $_SESSION['email']; ?>');
        $('#address').val('<?php echo $_SESSION['address']; ?>');
        $('#tel').val('<?php echo $_SESSION['tel']; ?>');

        $roleText = "";
        if ($('#role_id').val() == 4){
            roleText = "Admin";
        }else if ($('#role_id').val() == 3){
            roleText = "Laboratory-Teacher";
        }else if ($('#role_id').val() == 2){
            roleText = "Teacher";
        }else if ($('#role_id').val() == 1){
            roleText = "Student";
        }
        $('#role-dropdown').html(roleText);
        //set value to create
        document.getElementById('userid_create').value=document.getElementById('username').value;
        document.getElementById('fname_create').value=document.getElementById('fname').value;
        document.getElementById('lname_create').value=document.getElementById('lname').value;
        document.getElementById('role_id_create').value=document.getElementById('role_id').value;
        document.getElementById('email_create').value=document.getElementById('email').value;
        document.getElementById('address_create').value=document.getElementById('address').value;
        document.getElementById('tel_create').value=document.getElementById('tel').value;
      });
    </script>

</html>
