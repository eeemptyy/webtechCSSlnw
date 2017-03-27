$(document).ready(function() {
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
            generateCourseTable('now', 'now');
        },
        error: function(data) {
            console.log(data + ' error on page ready');
        }
    });
});

$('#select-year, #select-semester').change(function() {
    var semester = $('#select-semester option:selected').html();
    var year = $('#select-year option:selected').html();
    generateCourseTable(semester, year);
});

function generateCourseTable(semester, year) {
    var html = '<table id="datatable" class="table table-hover table-bordered"><thead><tr><th><input type="checkbox" id="select_all" value="" onclick="toggleCheck()"> All</th><th>Coruse ID</th><th>Coruse Name</th><th>Credit</th><th>Teacher ID</th><th>Teacher Name</th><th></th></tr></thead><tbody>';
    $.ajax({
        type: "POST",
        url: "controller/switcher.php",
        data: {
            func: "get_subject_by_semester",
            semester: semester,
            year: year
        },
        success: function(data) {
            var obj = JSON.parse(data);
            for (var i = 0, len = obj.length; i < len; ++i) {
                var objIn = obj[i];
                html += '<tr>';
                html += '<td><input class="childbox" type="checkbox" value=""></td><td>' +
                    objIn['subjectID'] + '</td><td>' +
                    objIn['name'] + '</td><td>' +
                    objIn['credit'] + '</td><td>' +
                    objIn['teacherID'] + '</td><td>' +
                    objIn['firstname'] + " " +
                    objIn['lastname'].substring(0, 2) + "." + '</td>';
                html += '<td><input type="button" id="delete" alt="Delete" data-toggle="modal" data-target="#deleteModal" value=""></td>';
                html += "</tr>";
            }
            html += '</tbody><tfoot><tr></tr></tfoot></table>';
            $('#tableDiv').html(html);
            $('#datatable').DataTable({
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

function toggleCheck() {
    var parBox = document.getElementById('select_all');
    if (parBox.checked == true) {
        var chbox = document.getElementsByClassName('childbox');
        for (var i = 0, len = chbox.length; i < len; ++i) {
            chbox[i].checked = true;
        }
    } else {
        var chbox = document.getElementsByClassName('childbox');
        for (var i = 0, len = chbox.length; i < len; ++i) {
            chbox[i].checked = false;
        }
    }

}