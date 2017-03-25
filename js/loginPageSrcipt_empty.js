function validateLogin() {

    var uname = $('#username').val();
    var pass = $('#pass').val();

    if (isValid(uname) && isValid(pass)) {
        $.ajax({
            type: "POST",
            url: "controller/switcher.php",
            data: {
                func: 'get_login',
                // func: "get_user",
                username: uname,
                pass: pass
            },
            success: function(data) {
                var obj = JSON.parse(data);
                alert("123 " + obj['username'] + " " + obj['firstname'] + " " + obj['lastname'] + " " + obj['role'] + " ")
                $("#username").val(obj['username']);
                $("#fname").val(obj['firstname']);
                $("#lname").val(obj['lastname']);
                $("#role_id").val(obj['role']);
                alert(obj['role'] + " 33321");
                alert($('#role_id').val + " AAAsss");
                return true;
            },
            error: function(data) {
                alert("error " + data);
            }
        });

        alert("XXX");

    } else {
        alert("Invalid Username/Password");
        return false;
    }

}

function isValid(text) {
    if (text == "" || text == " " || text == null) {
        return false;
    } else {
        return true;
    }
}