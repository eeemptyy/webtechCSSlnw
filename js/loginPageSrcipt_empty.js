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
                // alert(data);
                if (data == "Username/Password not found.") {
                    return false;
                } else {
                    var obj = JSON.parse(data);
                    // alert("123 " + obj['username'] + " " + obj['firstname'] + " " + obj['lastname'] + " " + obj['role'] + " ")
                    $("#username").val(obj['username']);
                    $("#fname").val(obj['firstname']);
                    $("#lname").val(obj['lastname']);
                    $("#role_id").val(obj['role']);
                    // alert(obj['role'] + " 33321");
                    // alert($('#role_id').val() + " AAAsss");
                    $("#myForm").submit();
                }
            },
            error: function(data) {
                // alert("error " + data);
                $("#displayError").html("error " + data);
            }
        });

    } else {
        // alert("Invalid Username/Password");
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