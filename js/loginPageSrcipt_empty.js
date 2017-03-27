$("#myForm").keyup(function(event) {
    if (event.keyCode == 13) {
        $("#loginBTN").click();
    }
});

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
                pass: hashToSHA1(pass)
            },
            success: function(data) {
                if (data == "Username/Password not found.") {
                    $("#displayError").html("Username/Password not found.");
                    return false;
                } else {
                    var obj = JSON.parse(data);
                    $("#username").val(obj['username']);
                    $("#fname").val(obj['firstname']);
                    $("#lname").val(obj['lastname']);
                    $("#role_id").val(obj['role']);
                    $("#email").val(obj['email']);
                    $("#address").val(obj['address']);
                    $("#tel").val(obj['tel']);
                    $('#picPath').val(obj['picPath']);
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