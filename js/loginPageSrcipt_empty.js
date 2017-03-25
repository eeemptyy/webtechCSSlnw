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
                alert("Is success");
                alert(data);
                var obj = JSON.parse(data);
                alert("AA");
                alert(obj['username'] + " " + obj['firstname'] + " " + obj['lastname'] + " " + obj['role'] + " ")
                alert("BB");
                $("#fname").val(obj['firstname']);
                $("#lname").val(obj['lastname']);
                $("#role").val(obj['role']);
                return true;
            },
            error: function(data) {
                alert("error " + data);
            }
        });

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