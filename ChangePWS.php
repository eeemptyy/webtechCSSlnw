<!DOCTYPE html>
<html lang="">
	<?php
    session_start();
    $role = $_SESSION['role_id'];
	?>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>EDIT PASSWORD</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
	<div class="container">


		 	<center><h2>Password</h2></center>
 		 <div class="form-group row">
     <label for="inputPassword3" class="col-sm-6 col-form-label" p align = "right">Present Password</label>
      <div class="col-sm-3">
        <input type="password" class="form-control" id="oldPass" placeholder="Password">
      </div>
    </div>

     		 <div class="form-group row">
      <label for="inputPassword3" class="col-sm-6 col-form-label" p align = "right">New Password</label>
      <div class="col-sm-3">
        <input type="password" class="form-control" id="newPass1" placeholder="Password" >
      </div>
    </div>

     		 <div class="form-group row">
      <label for="inputPassword3" class="col-sm-6 col-form-label" p align = "right">Again Password</label>
      <div class="col-sm-3">
        <input type="password" class="form-control" id="newPass2" placeholder="Password">
      </div>
    </div>
	<center>
		<input id="submitChangPws" class="btn btn-primary" type="submit" value="Submit">
		<input class="btn btn-primary" type="reset" value="Cancel" onclick="goBack()">
		</center>
	  </form>
</div>	
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
			}
	    </script>

 		<!-- mint -->
 		<script src="js/changePws.js"></script>

 		<!-- Password encryption part -->
    	<script src="js/sha1.js"></script>
    	<script src="js/passwordController.js"></script>
 	
	</body>
</html>