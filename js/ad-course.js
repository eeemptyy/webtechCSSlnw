$(document).ready(function(){
 
    var html = '<table class="table table-hover table-bordered"><thead><tr><th><input type="checkbox" id="select_all" value=""> All</th><th>Coruse ID</th><th>Coruse Name</th><th>Credit</th><th>Teacher ID</th><th>Teacher Name</th><th></th></tr></thead><tbody>';

    $.ajax({
    type: "POST",
    url: "controller/switcher.php",
    data: {
        func: "get_subject_by_semester"
        },
    success: function(data) {

        var obj = JSON.parse(data);
        for (var i = 0, len = obj.length; i < len; ++i) {
        var objIn = obj[i];
        html += '<tr>';
        html += '<td><input type="checkbox" value=""></td><td>' 
            + objIn['subjectID'] + '</td><td>' 
            + objIn['name']  + '</td><td>' 
            + objIn['credit'] + '</td><td>' 
            + objIn['teacherID'] + '</td><td>' 
            + objIn['firstname'] +  " "
            + objIn['lastname'].substring(0,2) +"."+ '</td>';
        html += '<td><input type="button" id="delete" alt="Delete" data-toggle="modal" data-target="#deleteModal" value=""></td>';
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