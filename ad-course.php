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
    <title>Administer-Subject</title>
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
                  <li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown">Course<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="ad-course.php">Course</a></li>
                      <li><a href="ad.php">Manage User</a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown"><div><img src="img/CircledUser.png" alt="" style="height:23px;"><label id=role-dropdown>Administer</label><b class="caret"></b></div></a>
                        <ul class="dropdown-menu">
                            <li><a href="ChangePWS.php">Edit Password</a></li>
                            <li><a href="login.html">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="content-section-b">
        <div class="container">
          <div class="row content-heading">
            <label class="course-label">Course  </label>
              <select id="select-year">
                <option>2016</option>
                <option>2017</option>
              </select>
              <label class="course-label">/</label>
              <select id="select-semester">
                <option>1</option>
                <option>2</option>
              </select>
          </div>


            <br />

            <ul class="list-inline intro-social-buttons">
                <li>
                    <a href="" class="btn-admin" onclick="resetForm()" data-toggle="modal" data-target="#myModal"><i><img src="img/Add-64.png" alt="" style="height:23px;"></i><span class="network-name">    CREATE NEW CORSE</span></a> &nbsp;&nbsp;
                </li>
                <li>
                    <a href="" class="btn-admin" data-toggle="modal" data-target="#CSVModal"><i><img src="img/AddFile-64.png" alt="" style="height:23px;"></i><span class="network-name">    UPLOAD COURSE (CSV)</span></a>&nbsp;&nbsp;
                </li>
                <li>
                    <form action="pdf/html2pdf-2.php" method="post" target="_blank">
                    	<a id="topdf" href="#" class="btn-admin" onClick="printPDFCourse()"><i><img src="img/Print-64.png" alt="" style="height:23px;"></i><span class="network-name">    PRINT TO PDF</span></a>&nbsp;&nbsp;
                    	<button type="submit" id="btPDF" hidden="" value=""></button>
                        <input type="text" value="" id="HTMLcode" name="HTMLcode" hidden=""/>
                    </form>
                </li>
            </ul>

            <div id="tableDiv"></div>


        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="">Home</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="">Administer</a>
                        </li>

                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; Your Company 2014. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Modal -->
    <form id="uploadSubjectCSV" class="" action="index.html" method="post">
        <div id="CSVModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><img src="img/AddFile-64.png" alt="" style="height:30px;"> Upload Course(CSV)</h4>
                    </div>
                    <div class="modal-body">
                        <p>
                            Choose CSV of <i><u>course-data</u></i> for upload to append Courses.
                        </p>
                        <div>
                          <input name="inputFile" type="file" class="file form-control-file btn btn-default" style="width:100%; text-align:center;">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="modal-subjectcsv-submit" type="submit" class="btn btn-default" data-dismiss="modal">Submit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    </form>


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
                        <button type="submit" class="btn btn-default" data-dismiss="modal">Submit</button>
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
                        <h4 class="modal-title"><img src="img/Add-64.png" alt="" style="height:30px;"> Create new course</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="courseID">Course ID:</label>
                            <input type="text" id="courseID_create"class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="courseName">Course Name:</label>
                            <input type="text" id="courseName_create" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="credit">Credit:</label>
                            <input type="text" id="credit_create"class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button  type="submit" id="model-createSubject" class="btn btn-default"  data-dismiss="modal" >Submit</button>
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
    <!-- guitar -->
    <script src="js/ad-course.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- mint -->
    <script src="js/mint-alertbox.js"></script>

    <!--report-->
    <script src="js/report.js"></script>

    <script>
        $("form#uploadSubjectCSV").submit(function(){

            var formData = new FormData($(this)[0]);

            $.ajax({
                url: "controller/uploadCSV.php",
                type: 'POST',
                data: formData,
                async: false,
                success: function (data) {
                    alert(data);
                    location.reload();
                },
                cache: false,
                contentType: false,
                processData: false
            });

            return false;
        });
        $('#modal-subjectcsv-submit').click(function() {
            $('#uploadSubjectCSV').submit();
        });
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
