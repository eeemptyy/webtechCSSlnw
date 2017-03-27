//mint
$("#submitChangPws").click(function() {
	//var value = $_SESSION['varname'];
    
    var uname = $('#username').val();
    var oldPass = $('#oldPass').val();
    var newPass1 = $('#newPass1').val();
    var newPass2 = $('#newPass2').val();
    var hold = false;

    if(newPass1 == null || newPass2 == null || oldPass == null){
        alert("null value");
    }
    else if(newPass1!=newPass2){
        alert("new password not match");
    }
    else if(newPass1==newPass2 && newPass1 != null && newPass2 != null){
        hold=true;
        document.getElementById('oldPass').value="";
        document.getElementById('newPass1').value="";
        document.getElementById('newPass2').value="";
    }

    if (isValid(uname) && isValid(oldPass) && hold==true) {
        $.ajax({
            type: "POST",
            url: "controller/switcher.php",
            data: {
                func: 'edit_password',
                username: uname,
                newPass: hashToSHA1(newPass1),
                oldPass: hashToSHA1(oldPass)
            },
            success: function(data) {
                alert(data);
                if (data == "Username/Password not found.") {
                    return false;
                } else {
                    alert(hashToSHA1(pass));
                    var obj = JSON.parse(data);
                    $("#username").val(obj['username']);
                    $("#fname").val(obj['firstname']);
                    $("#lname").val(obj['lastname']);
                    $("#role_id").val(obj['role']);
                    $("#email").val(obj['email']);
                    $("#address").val(obj['address']);
                    $("#tel").val(obj['tel']);
                    $("#myForm").submit();
                }
            },
            error: function(data) {
                $("#displayError").html("error " + data);
            }
        });

    } else {
        $("#displayError").html("Invalid Username/Password");
    }
});




function isValid(text) {
    if (text == "" || text == " " || text == null) {
        return false;
    } else {
        return true;
    }
}


