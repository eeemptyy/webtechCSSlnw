$(document).ready(function() {

    $('#firstname').text($('#fname').val());
    $('#lastname').text($('#lname').val());
    $('#usr').text($('#username').val());
    $('#role').text(isRole($('#role_id').val()));
    $('#tel-phone').text($('#tel').val());
    $('#e-mail').text($('#email').val());
    $('#addr').text($('#address').val());
    $('#role-dropdown').text(isRole($('#role_id').val()));

    var yearArr = [];
    var semArr = [];

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

function isRole(text) {
    if (text == "1") {
        return "Student";
    }
    if (text == "2") {
        return "Teacher";
    }
    if (text == "3") {
        return "Laboratory-Teacher";
    }
    if (text == "4") {
        return "Admin";
    }
}

$('#select-year, #select-semester').change(function() {
    var semester = $('#select-semester option:selected').html();
    var year = $('#select-year option:selected').html();
    var name = $('#usr').text();
    generateCourseTableByStudentID(semester, year, name);
});

function generateCourseTableByStudentID(semester, year, username) {
    //    alert("show :: " + semester + ", " + username + ", " + year);
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
            //            alert("out: " + data);
            for (var i = 0, len = obj.length; i < len; ++i) {
                var objIn = obj[i];
                html += '<tr>';
                html += '<td class="text-center">' + objIn['CourseID'] + '</td><td>' + objIn['CourseName'] + '</td><td class="text-center">' +
                    objIn['credit'] + '</td><td class="text-center">' +
                    checkGrade(objIn['grade']) + '</td>';
                html += '<td class="text-center"><input type="button" id="comments"  value="" alt="Comment" onclick=" window.open("","_blank")"></td>';
                html += "</tr>";
            }
            html += '</tbody><tfoot><tr></tr></tfoot></table>';
            $('#table-div').html(html);
            $('#datatable-student').DataTable({
                "order": [
                    [1, "asc"]
                ],
                // "pageLenght": 25,

                destroy: true,
                "autoWidth": false,
                "paging": false,
                // "ordering": false,
                "info": false
            });

        },
        error: function(data) {
            alert("error " + data);
        }

    });
}

function checkGrade(text) {
    if (text == null) {
        return "";
    } else {
        if (text == "4") { return "A"; } else if (text == "4") { return "A"; } else if (text == "3.5") { return "B+"; } else if (text == "3") { return "B"; } else if (text == "2.5") { return "C+"; } else if (text == "2") { return "C"; } else if (text == "1.5") { return "D+"; } else if (text == "1") { return "D"; } else if (text == "0") { return "F"; }


    }
}