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
    <title>Teacher Profile</title>
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
    <link href="css/profile.css" rel="stylesheet" />
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
                  <!-- <li>Course</li> -->
                  <li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown"><div><img src="img/CircledUser.png" alt="" style="height:23px;"><label id=role-dropdown>Teacher</label><b class="caret"></b></div></a>
                        <ul class="dropdown-menu">
                            <li><a href="edit_user.php">Edit Profile</a></li>
                            <li><a href="changePW.php">Edit Password</a></li>
                            <li><a href="controller/kill_session.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="content-section-b bg-out">
        <div class="container">
          <div class="head-profile box-whiteshadow">

            <div class="box-left">
              <a data-target="#uploadModal" data-toggle="modal" class="list-quotes" href="#uploadModal">
                <img id="profileImage" src="files/img/profile/contact-default3.png" alt="profile picture">
                <!-- <img  src="img/5.png" alt="profile picture"> -->
                <div class="quotes">
                    <p style="text-align:center;">
                        Change your profile picture <span>...Click</span>
                    </p>
                </div>
            </a>
            </div>

            <div class="box-containt">
              <label class="name" id="firstname">Boonyaporn</label>&nbsp;&nbsp;&nbsp;&nbsp;<lable class="name" id="lastname">Narkjumrussri</lable><br />
               <div class="list-inline">
                 <div class="col-sm-2 size-content pantone-brown">Username ID</div>
                 <div class="col-sm-1 size-content pantone-brown" >:</div>
                 <div class="col-sm-9 size-content" id="usr">5610404452</div>
               </div><br />
               <div class="list-inline">
                 <div class="col-sm-2 size-content pantone-brown">Role</div>
                 <div class="col-sm-1 size-content pantone-brown">:</div>
                 <div class="col-sm-9 size-content" id="role">Laboratory-Teacher</div>
               </div><br />
               <div class="list-inline">
                 <div class="col-sm-2 size-content pantone-brown">Moblie Phone</div>
                 <div class="col-sm-1 size-content pantone-brown">:</div>
                 <div id="tel-phone" class="col-sm-9 size-content">095-558-5492</div>
               </div><br />
               <div class="list-inline">
                 <div class="col-sm-2 size-content pantone-brown">E-mail</div>
                 <div class="col-sm-1 size-content pantone-brown">:</div>
                 <div class="col-sm-9 size-content" id="e-mail">boonyaporn.n@ku.th</div>
               </div><br />
               <div class="list-inline">
                 <div class="col-sm-2 size-content pantone-brown">Address</div>
                 <div class="col-sm-1 size-content pantone-brown">:</div>
                 <div class="col-sm-5 size-content" id="addr">161/149, Soi.Intramara41, Sutthisan Road, Dindang, Bangkok, Thailand, 10400</div>
                 <div class="col-sm-4 size-content"></div>
               </div><br />
            </div>
          </div>

          <div class="content">

          <div class="list-inline">
            <div class="col-sm-4"><input class="btn btn-primary btn-block teacher-button" type="button" value="Generate Class QRCode" onclick=" window.open('generateQR.php','_blank')"></div>
            <div class="col-sm-4"><input class="btn btn-primary btn-block teacher-button" type="button" value="View Class-member" onclick=" window.open('all_class.php','_blank')"></div>
            <div class="col-sm-4"><input class="btn btn-primary btn-block teacher-button" type="button" value="View Student" onclick=" window.open('AllStudent.php','_blank')"></div>
          </div><br />
          <hr class="hr-design">
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
    <form id="uploadimage" class="" action="" method="post">
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
                      <input type="file" accept="image/png, image/jpeg, image/gif" name="inputFile" id="inputFile"/> <!-- rename it -->
                      <input type="text" id="uname" name="uname" hidden />
                  </div>
              </span>
          </div><!-- /input-group image-preview [TO HERE]-->
                    </div>
                    <div class="modal-footer">
                        <button id="modal-submit" type="submit" class="btn btn-default" data-dismiss="modal">Submit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    </form>

    <input type="text" id="username"  hidden/>
    <input type="text" id="fname" hidden />
    <input type="text" id="lname" hidden />
    <input type="text" id="role_id" hidden />
    <input type="text" name="email" id="email" hidden>
    <input type="text" name="address" id="address" hidden>
    <input type="text" name="tel" id="tel" hidden>
    <input type="text" name="picPath" id="picPath" hidden>

</body>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <!-- guitar -->
    <script src="js/upload-pic-modal.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script>

        $("form#uploadimage").submit(function(){

            var formData = new FormData($(this)[0]);

            $.ajax({
                url: "controller/uploadPicture.php",
                type: 'POST',
                data: formData,
                async: false,
                success: function (data) {
                    var path = data.split(":")[1].split("../")[1];
                    location.reload();
                },
                cache: false,
                contentType: false,
                processData: false
            });

            return false;
        });
        $('#modal-submit').click(function() {
            $('#uploadimage').submit();
        });
        $(document).ready(function() {
            $('#username').val('<?php echo $_SESSION['username'];?>');
            $('#fname').val('<?php echo $_SESSION['fname'];?>');
            $('#lname').val('<?php echo $_SESSION['lname'];?>');
            $('#role_id').val('<?php echo $_SESSION['role_id'];?>');
            $('#email').val('<?php echo $_SESSION['email'];?>');
            $('#address').val('<?php echo $_SESSION['address'];?>');
            $('#tel').val('<?php echo $_SESSION['tel'];?>');
            $('#picPath').val('<?php echo $_SESSION['picPath'];?>');

            $('#profileImage').attr("src", $('#picPath').val());
        });
    </script>

    <script src="js/upload_profile.js"></script>

</html>
