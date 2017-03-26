$(document).ready(function() {

    var uname = <?php echo $_SESSION['usernmae']; ?>;
    $('#username').val(uname);

});