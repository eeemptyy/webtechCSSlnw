$(document).ready(function(){
    
    var html = '<table id="mydatatable" class="table table-hover table-bordered"><thead><tr><th class="text-center">Student ID</th><th class="text-center">Student Name</th><th class="text-center">View More</th></tr></thead><tbody>';


    $.ajax({
    type: "POST",
    url: "controller/switcher.php",
    data: {
        func: "get_student"
        },
    success: function(data) {
//        alert("aa:"+data);
            var obj = JSON.parse(data);
            for (var i = 0, len = obj.length; i < len; ++i) {
                    var objIn = obj[i];
                    html += '<tr>';
                    html += '<td class="text-center">' + objIn['username'] +'</td><td>' + objIn['firstname'] +" &nbsp;&nbsp;"+  objIn['lastname'] + '</td>';
                    html += '<td class="text-center"><input type="button" id="comments"  value="" alt="Comment" onclick=" window.open("","_blank")"></td>';
                    html += "</tr>";
            }
            html += '</tbody><tfoot><tr></tr></tfoot></table>';
            $('#table').html(html);
            $('#mydatatable').DataTable({
              "order": [[1, "asc"]],
              // "pageLenght": 25,

              destroy: true,
              "autoWidth": false,
              "paging":   false,
              // "ordering": false,
              "info":     false
            });
    },
          error: function(data) {
              alert("error "+data);
          }

      });
    });