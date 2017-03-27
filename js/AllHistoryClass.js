$(document).ready(function(){
    
//    var html = '<table id="mydatatable" class="table table-hover table-bordered"><thead><tr><th class="text-center">Student ID</th><th class="text-center">Student Name</th><th class="text-center">View More</th></tr></thead><tbody>';
    var html = "";


    $.ajax({
    type: "POST",
    url: "controller/switcher.php",
    data: {
        func: "get_all_class"
        },
    success: function(data) {
//        alert("aa:"+data);
            var obj = JSON.parse(data);
            for (var i = 0, len = obj.length; i < len; ++i) {
                    var objIn = obj[i];
                //28/03/2017 &nbsp;
                html += '<a class="link-class">' 
                    +"[ "+objIn['Time']+" ]"+ '&nbsp;&nbsp;&nbsp;' 
                    +objIn['SubjectID'] +  '&nbsp;&nbsp;&nbsp;'  
                    +objIn['name']+" - "
                    + objIn['fname']+'</a><br />';
//                    html += '<tr>';
//                    html += '<td class="text-center">' + objIn['username'] +'</td><td>' + objIn['firstname'] +" &nbsp;&nbsp;"+  objIn['lastname'] + '</td>';
//                    html += '<td class="text-center"><input type="button" id="comments"  value="" alt="Comment" onclick=" window.open("","_blank")"></td>';
//                    html += "</tr>";
            }
//            html += '</tbody><tfoot><tr></tr></tfoot></table>';
            $('#link-all-class').html(html);
//            $('#mydatatable').DataTable({
//              "order": [[1, "asc"]],
//              // "pageLenght": 25,
//
//              destroy: true,
//              "autoWidth": false,
//              "paging":   false,
//              // "ordering": false,
//              "info":     false
//            });
    },
          error: function(data) {
              alert("error "+data);
          }

      });
    });