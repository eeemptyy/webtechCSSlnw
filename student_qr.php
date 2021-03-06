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
        <title>Student Profile</title>
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
        <div class="content-section-b bg">
            <div class="container transparent-bg">
                <div class="row transparent-bg">
                    <div class="col-md-12">
                        <div class="panel panel-heading">
                            <label class="title-text">- Turn in Classroom QRcode -</label>
                        </div>
                        <div class="panel panel-body transparent-bg" style="padding:0px 50px;">
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <center><h3 id="decodeText" style="color:#F00"></h3></center>
                                    </div>
                                    <div class="form-group">
                                        <center><img class="img-thumbnail img-margin" id="imgQR" src="img/qrcode.png" style="height:200px;"></center>
                                    </div>
                                    <div class="form-group">
                                      <input class="btn btn-primary btn-block btn-qr" type="button" value="Upload" data-toggle="modal" data-target="#uploadModal">
                                    </div>
                                    <div class="form-group">
                                      <input id="btUpload" class="btn btn-primary btn-block btn-qr" type="button" value="Submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <!-- Modal -->
        <form id="uploadimage" class="" action="" method="post">
            <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><img src="img/uploadqr.png" alt="" style="height:30px;"> Upload QR Code</h4>
                    </div>
                        <div class="modal-body">
                        <input type="file" name="inputFile" id="inputFile" class="file form-control-file btn btn-default" style="width:100%; text-align:center;">

                        </div>
                        <div class="modal-footer">
                            <button id="modal-close" type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button id='modal-submit' type="button" class="btn btn-primary" id="modal-btUpload" >Upload</button>
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
                            <li><a href="">Student</a></li>
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
    </body>


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!--QR Coder Decoder-->
    <script src="js/qcode-decoder.min.js"></script>

    <script>
        $("form#uploadimage").submit(function(){

            var formData = new FormData($(this)[0]);

            $.ajax({
                url: "controller/uploadQR.php",
                type: 'POST',
                data: formData,
                async: false,
                success: function (data) {
                    var path = data.split(":")[1].split("../")[1];
                    alert(data);
                    $('#imgQR').attr("src",path);
                    $('#modal-close').click();
                    // location.reload();
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


            $("#btUpload").click(function(data) {
                if (document.getElementById("inputFile").files.length == 0) {
                    alert("upload your qrcode");
                } else {
                    alert("In else");
                    $('#uploadModal').modal('hide');
                    var file = document.getElementById("inputFile").files[0].name;
                    // $("#imgQR").attr('src', 'img/' + file);
                    var image = document.getElementById("imgQR");
                    var qr = new QCodeDecoder();
                    qr.decodeFromImage(image, function(err, result) {
                        if (err) throw err;
                        $('#decodeText').html(result);
                        alert(result);
                        checkIn(result.split(" ")[0]);
                    });
                }
            });
        });

        function checkIn(id){
            $.ajax({
                type: "POST",
                url: "controller/switcher.php",
                data: {
                    func: 'check_in_class',
                    classID: id,
                    username: $('#username').val()
                },
                success: function(data) {
                    alert(data);
                },
                error: function(data) {
                    alert(data + " ERROR");
                }
            });

        }
    </script>

</html>
