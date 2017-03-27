<!DOCTYPE html>
<html lang="en">

<?php
    session_start();
    $role = $_SESSION['role_id'];
    if ($role < 2){
        header("Location: login.html");
    }
?>

<head>
    <title>Generate QR code</title>
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Pacifico|Passion+One" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">
    <link href="css/generateQR-css.css" rel="stylesheet" />
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
                    <li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown"><div><img src="img/CircledUser.png" alt="" style="height:23px;"><label id=role-dropdown>Student</label><b class="caret"></b></div></a>
                        <ul class="dropdown-menu">
                            <li><a href="">Edit Profile</a></li>
                            <li><a href="">Edit Password</a></li>
                            <li><a href="login.html">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="content-section-b">
        <div class="container">
            <div class="box-containt">
              <label class="title-text">- Generate Classroom -</label>
              <div class="box-img">
                <img id='displayQR' src="img/noclass.jpg" alt="QR Code">
              </div>
              <form>
                <div class="qr-option">
                  <div class="form-group">
                      <label for="usr">Course:</label>
                      <select id="course-select" class="form-control">
                          <option>01418221 Database</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="firstname">Section:</label>
                      <select id="section-select" class="form-control">
                          <option>200</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="lastname">Time out:<small> ex.09:30 AM</small></label>
                      <input type="time" class="form-control" id="timee">
                  </div>
                  <input id="getQR" class="btn btn-primary btn-block btn-qr" type="button" value="Generate">
                </div>
              </form>
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
                        <li><a href="">Teacher</a></li>
                        <li class="footer-menu-divider">&sdot;</li>
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
    <script>

        $(document).ready(function() {
            $('#username').val('<?php echo $_SESSION['username'];?>');
            $('#fname').val('<?php echo $_SESSION['fname'];?>');
            $('#lname').val('<?php echo $_SESSION['lname'];?>');
            $('#role_id').val('<?php echo $_SESSION['role_id'];?>');
            $('#email').val('<?php echo $_SESSION['email'];?>');
            $('#address').val('<?php echo $_SESSION['address'];?>');
            $('#tel').val('<?php echo $_SESSION['tel'];?>');
            
            alert($('#role_id').val());
            var roleText = "";
            if ($('#role_id').val() == '4') {
                roleText = "Admin";
            } else if ($('#role_id').val() == '3') {
                roleText = "Laboratory-Teacher";
            } else if ($('#role_id').val() == '2') {
                roleText = "Teacher";
            } else {
                roleText = "Student";
            }
            $('#role-dropdown').html(roleText);

            $.ajax({
                type: "POST",
                url: "controller/switcher.php",
                data: {
                    func: 'gen_drop_for_qr',
                    username: $('#username').val(),
                    subjectID: $('#select-semester option:selected').html().split(" ")[0],
                    year: "2016",
                    semester: "2"
                },
                success: function(data) {
                    alert(data);
                    var obj = JSON.parse(data);
                    var out = "";
                    for (i = 0; i < obj.length; i++) {
                        out += '<option>' + obj[i]['id_subject'] + " "+obj[i]['name'] + '</option>';
                    }
                    $('#course-select').html(out);
                },
                error: function(data) {
                    $("#displayError").html("error " + data);
                }
            });

        });

        $('#course-select').change(function() {
            $.ajax({
                type: "POST",
                url: "controller/switcher.php",
                data: {
                    func: 'gen_drop_for_qr_2_section',
                    username: $('#username').val(),
                    year: "2016",
                    semester: "2"
                },
                success: function(data) {
                    alert(data);
                    var obj = JSON.parse(data);
                    var out = "";
                    for (i = 0; i < obj.length; i++) {
                        out += '<option>' + obj[i]['section']+ '</option>';
                    }
                    $('#section-select').html(out);
                },
                error: function(data) {
                    $("#displayError").html("error " + data);
                }
            });
        });

        $('#getQR').click(function() {
            var subjectID = $('#course-select option:selected').html().split(" ")[0];
            var section = $('#section-select option:selected').html();
            alert(subjectID + " " + section);
            alert($('#timee').val());
            $.ajax({
                type: "POST",
                url: "controller/switcher.php",
                data: {
                    func: 'get_QR',
                    subjectID: subjectID,
                    section: section,
                    timeLimit: $('#timee').val()
                },
                success: function(data) {
                    alert(data);
                    data = data.split("../")[1];
                    alert(data)
                    $('#displayQR').attr("src", data);
                },
                error: function(data) {
                    $("#displayError").html("error " + data);
                }
            });
        });
    </script>
</html>
