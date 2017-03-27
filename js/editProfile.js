//mint
$("#updateProfileBtn").click(function() {
    //var value = $_SESSION['varname'];
    var uname = $('#userid_create').val();
    var fname = $('#fname_create').val();
    var lname = $('#lname_create').val();
    var tel = $('#tel_create').val();
    var address = $('#address_create').val();
    var email = $('#email_create').val();
    var role_id = $('#role_id_create').val();

    // alert("Popup email " + email);
    //alert(uname+"|"+oldPass+"|"+newPass1+"|"+newPass2)


    if (isValid(fname) && isValid(lname) && isValid(tel) && isValid(address) && isValid(email)) {
        $.ajax({
            type: "POST",
            url: "controller/switcher.php",
            data: {
                func: 'edit_user_by_user',
                username: uname,
                newFname: fname,
                newLname: lname,
                email: email,
                mobile: tel,
                address: address
            },
            success: function(data) {
                //alert(data);
                
                updateMySession(uname, fname, lname, tel, address, role_id, email);

                
            },
            error: function(data) {
                alert(data);
            }
        });
        alert("Database Update successful.");
    } else {
        alert("please fill all field");
    }
});

function updateMySession(uname, fname, lname, tel, address, role_id, email) {
    // alert(uname + " u>" + fname + " f>" + lname + " l>" + tel + " t>" + address + " a>" + role_id + ' e>' + email);
    // alert("Popup email 2 " + email);
    var data = {
        username: uname,
        fname: fname,
        lname: lname,
        email: email,
        tel: tel,
        address: address,
        role_id: role_id
    };
    $.ajax({
        type: "POST",
        url: "controller/update_session.php",
        data: data,
        success: function(data) {
            // alert(data + "Hello " + role_id);
            role_id = parseInt(role_id);
            if (role_id > 3) {
                window.location.replace("ad.php");
            } else if (role_id < 2) {
                window.location.replace("student_profile.php");
            } else {
                window.location.replace("teacher_profile.php");
            }
        },
        error: function(data) {
            alert(data);
        }
    });
}

function isValid(text) {
    if (text == "" || text == " " || text == null) {
        //alert('valid '+text+' false')
        return false;
    } else {
        //alert('valid '+text+' true')
        return true;
    }
}