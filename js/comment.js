$(document).ready(function(){
        $('#usr_id').text($('#username').val());
//        $('#firstname').text();
//        $('#lastname').text();
        var username_stu =$('#username').val();
        var year =$('#year').val();
        var semester =$('#semester').val();
        var subjectID =$('#course_id').val();
//    alert(username_stu+":"+year+":"+semester+":"+subjectID);
//    alert("show :: " + semester + ", " + username + ", " + year);
//    var html = '<div class="student-box" id="student-box"style="width:100%; background:rgba(189, 167, 141, 0.74); height:auto; padding-button:20px;">';
    var html = "";
    $.ajax({
        type: "POST",
        url: "controller/switcher.php",
        data: {
            func: "get_comment_by_subject",
            usernameStu: username_stu,
            year : year,
            semester : semester,
            subjectID : subjectID
        },
        success: function(data) {
//             alert("out: " + data);
            var obj = JSON.parse(data);
           
                        for (var i = 0, len = obj.length; i < len; ++i) {
                            var objIn = obj[i];
                            
                            html += '<div class="student-box" id="student-box"style="width:100%; background:rgba(189, 167, 141, 0.74); height:auto; padding-button:20px;"><div class="form-group"><label for="comment"><b><u>'+objIn['TeacherFName']+ ':</u></b></label><p style="margin-left:30px;">'+objIn['comment_text']+
                   '</p></div>';
                             html += '<div class="form-group"><input id="submitChangPws" class="btn btn-default" style="font-size:12px; color:black; float:right;" type="button" value="Delete"></div><br /></div>';
//                            html += '<tr>';
//                            html += '<td class="text-center">'+objIn['CourseID']+ '</td><td>' +objIn['CourseName']+ '</td><td class="text-center">'
//                                +objIn['credit']+ '</td><td class="text-center">'
//                                +checkGrade(objIn['grade'])+ '</td>';
//                            html += '<td class="text-center"><input type="button" id="comments"  value="" alt="Comment" onclick=" window.open("","_blank")"></td>';
//                            html += "</tr>";
                        }
            html += "</div>"
                       
                        $('#all_comment').html(html);
//                        $('#datatable-student').DataTable({
//                            "order": [
//                                [1, "asc"]
//                            ],
//                            // "pageLenght": 25,
//            
//                            destroy: true,
//                            "autoWidth": false,
//                            "paging": false,
//                            // "ordering": false,
//                            "info": false
//                        });

        },
        error: function(data) {
            alert("error " + data);
        }

    });

$('#model-editGrade').click(function(){
    
});
    
});
function changGradeBtn()
{
//    alert();
    $('#user_edit').val($('#username').val()) ;
    $('#name_edit').val($('#fname').val()+"  "+$('#lname').val());
    $('#grade_edit').val($('#grade').val());
    
}