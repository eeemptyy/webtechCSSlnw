$(document).ready(function(){
//    var user = $('#username').val();
//    alert("username :"+$('#role-dropdown option:selected').text());
//    document.getElementById("usr") = $('#username').val();
    $('#firstname').text( $('#fname').val()) ;
    $('#lastname').text($('#lname').val());
    $('#usr').text($('#username').val()) ;
    $('#role').text(isRole($('#role_id').val())) ;
    $('#tel-phone').text($('#tel').val()) ;
    $('#e-mail').text($('#email').val()) ;
    $('#addr').text($('#address').val()) ;
    $('#role-dropdown').text(isRole($('#role_id').val()));
//    document.getElementById("usr") = $('#username').val();
}); 
function isRole(text)
{
    if(text == "1")
        {
            return "Student";
        }
    if(text == "2")
        {
            return "Teacher";
        }
    if(text == "3")
        {
            return "Laboratory-Teacher";
        }
    if(text == "4")
        {
            return "Admin";
        }
}