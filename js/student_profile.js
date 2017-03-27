$(document).ready(function(){
//    var user = $('#username').val();
//    alert("username :"+$('#role-dropdown').val());
//    document.getElementById("usr") = $('#username').val();
    $('#firstname').text( $('#fname').val()) ;
    $('#lastname').text($('#lname').val());
    $('#usr').text($('#username').val()) ;
    $('#role').text(isRole($('#role_id').val())) ;
    $('#tel-phone').text($('#tel').val()) ;
    $('#e-mail').text($('#email').val()) ;
    $('#addr').text($('#address').val()) ;
    $('#role-dropdown').text(isRole($('#role_id').val()));

    var yearArr = [];
    var semArr = [];
//    alert($('#firstname').text());
    $.ajax({
        type: "POST",
        url: "controller/switcher.php",
        data: {
            func: "get_year_sem_drop",
        },
        success: function(data) {
            var obj = JSON.parse(data);
            var year = '';
            var sem = '';
            for (i = 0; i < obj.length; i++) {
                if (yearArr.indexOf(obj[i]['year']) < 0) {
                    yearArr.push(obj[i]['year']);
                    year += '<option>' + obj[i]['year'] + '</option>';
                }
                if (semArr.indexOf(obj[i]['semester']) < 0) {
                    semArr.push(obj[i]['semester']);
                    sem += '<option>' + obj[i]['semester'] + '</option>';
                }
            }
            $('#select-year').html(year);
            $('#select-semester').html(sem);
            generateCourseTableByStudentID('now', 'now', $('#usr').text());
        },
        error: function(data) {
            console.log(data + ' error on page ready');
        }
    
    
}); 
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
    
$('#select-year, #select-semester').change(function() {
    var semester = $('#select-semester option:selected').html();
    var year = $('#select-year option:selected').html();
    var name = $('#usr').text();
    generateCourseTableByStudentID(semester, year, name);
});
    
function generateCourseTableByStudentID(semester, year , username) {
    alert("show :: "+semester+", "+username+", "+year);
    var html = '<table id="datatable-student" class="table table-hover table-bordered"><thead><tr><th><center>Course ID</center></th><th><center>Course Name</center></th><th><center>Credit</center></th><th><center>Grade</center></th><th><center>View Comment</center></th></tr></thead><tbody>';
    $.ajax({
        type: "POST",
        url: "controller/switcher.php",
        data: {
            func: "get_subject_by_studentID",
            username: username,
            semester: semester,
            year: year
        },
        success: function(data) {
            var obj = JSON.parse(data);
            alert("out: "+data);
//            for (var i = 0, len = obj.length; i < len; ++i) {
//                var objIn = obj[i];
//                html += '<tr>';
//                html += '<td><span style="display:none">'+i+'</span><input class="childbox" type="checkbox" value="" id="check_'+i+'"></td><td>' +
//                    objIn['subjectID'] + '</td><td>' +
//                    objIn['name'] + '</td><td>' +
//                    objIn['credit'] + '</td><td>' +
//                    objIn['teacherID'] + '</td><td>' +
//                    objIn['firstname'] + " " +
//                    objIn['lastname'].substring(0, 2) + "." + '</td>';
//                html += '<td><input type="button" id="delete" alt="Delete" data-toggle="modal" data-target="#deleteModal" value=""></td>';
//                html += "</tr>";
//            }
//            html += '</tbody><tfoot><tr></tr></tfoot></table>';
//            $('#tableDiv').html(html);
//            $('#datatable').DataTable({
//                "order": [
//                    [1, "asc"]
//                ],
//                // "pageLenght": 25,
//
//                destroy: true,
//                "autoWidth": false,
//                "paging": false,
//                // "ordering": false,
//                "info": false
//            });

        },
        error: function(data) {
            alert("error " + data);
        }

    });
}