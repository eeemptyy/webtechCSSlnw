$("#loginBTN").click(function() {
    var uname = $('#username').val();
    var pass = $('#pass').val();

    if (isValid(uname) && isValid(pass)) {
        $.ajax({
            type: "POST",
            url: "controller/switcher.php",
            data: {
                func: 'get_login',
                username: uname,
                pass: pass
            },
            success: function(data) {
                alert(data);
                if (data == "Username/Password not found.") {
                    return false;
                } else {
                    var obj = JSON.parse(data);
                    $("#username").val(obj['username']);
                    $("#fname").val(obj['firstname']);
                    $("#lname").val(obj['lastname']);
                    $("#role_id").val(obj['role']);
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