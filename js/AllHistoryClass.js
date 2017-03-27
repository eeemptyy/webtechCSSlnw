$(document).ready(function(){
    

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

            }

            $('#link-all-class').html(html);

    },
          error: function(data) {
              alert("error "+data);
          }

      });
    });