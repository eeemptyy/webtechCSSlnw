
    //data for province combobox
$(document).ready(function(){
    var html = '<table class="table table-hover table-bordered"><thead><tr><th><input type="checkbox" id="select_all" value=""> All</th><th>Username ID</th><th>Firstname</th><th>Lastname</th><th>Role</th><th></th></tr></thead><tbody>';

    $.ajax({
    type: "POST",
    url: "controller/switcher.php",
    data: {
        func: "get_user"
        },
    success: function(data) {
        var obj = JSON.parse(data);
        for (var i = 0, len = obj.length; i < len; ++i) {
        var objIn = obj[i];
        html += '<tr>';
        html += '<td><input type="checkbox" value=""></td><td>' + objIn['username'] + '</td><td>' + objIn['firstname'] + '</td><td>' + objIn['lastname'] + '</td><td>' + objIn['role'] + '</td>';
        html += '<td><input type="button" id="edit" alt="Edit" data-toggle="modal" data-target="#editModal" value="" value=""><input type="button" id="delete" alt="Delete" data-toggle="modal" data-target="#deleteModal" value=""></td>';
        html += "</tr>";
}
html += '</tbody><tfoot><tr></tr></tfoot></table>';
  $(html).appendTo('#table');          
            
    },
    error: function(data) {
        alert("error "+data);
    }
}); 






});

   
