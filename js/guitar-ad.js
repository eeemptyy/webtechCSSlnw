var del_user = "";
var currentID = "";
$(document).ready(function(){
    
    var html = '<table id="mydatatable" class="table table-hover table-bordered"><thead><tr><th><input type="checkbox" id="select_all" value="" onclick="toggleCheck()"> All</th><th>Username ID</th><th>Firstname</th><th>Lastname</th><th>Role</th><th></th></tr></thead><tbody>';


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
                    html += '<td><span style="display:none">'+i+'</span><input class="childbox" type="checkbox" value="" id="check_'+i+'"></td><td>' + objIn['username'] + '</td><td>' + objIn['firstname'] + '</td><td>' + objIn['lastname'] + '</td><td>' + objIn['role'] + '</td>';
                    html += '<td><input type="button" id="edit"  value="" onclick="editTable(this)" alt="Edit" data-toggle="modal" data-target="#editModal"><input type="button" id="delete" alt="Delete" onclick=getUser(this) data-toggle="modal" data-target="#deleteModal" value=""></td>';
                    html += "</tr>";
            }
            html += '</tbody><tfoot><tr></tr></tfoot></table>';
            $(html).appendTo('#table');
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

    //click submit in create-user form
$("#modal-createUser").click(function() {
     var userid = $('#userid_create').val();
     var fname = $('#fname_create').val();
     var lname = $('#lname_create').val();
     var role_create = $('#role_create').val();
     var pass = startGen();
     alert("usr: "+ userid +" pass: "+ pass+ " firstname: "+ fname + " lastname: "+ lname + " role: "+ role_create);
     if(isValid(fname) && isValid(lname) && isID(userid))
         {
             $.ajax({
                 type: "POST",
                 url: "controller/switcher.php",
            data: {
                func: 'create_user',
                username: userid,
                password: pass ,
                firstname: fname,
                lastname: lname,
                role: role_create
             },
                 success : function(data){
//                     alert("success "+data);
                     location.reload();

                 }
             });
         }
        else {
            return false;
        }

 });
    
    //click submit in edit-user form
$('#model-editUser').click(function() {
   
    var user_edit = $("#usr").val();
    var fname_edit = $("#firstname").val();
    var lname_edit = $("#lastname").val();
    var role_edit = $("#role").val();
    
     alert(currentID.eq(1).html() +" "+$("#usr").val()
           +" "+currentID.eq(2).html()+":"+$("#firstname").val()
           +" "+currentID.eq(3).html()+":"+$("#lastname").val()
           +" "+currentID.eq(4).html()+":"+$("#role").val());
    if(currentID.eq(2).html() == $("#firstname").val() &&
        currentID.eq(3).html() == $("#lastname").val() &&
        currentID.eq(4).html() == $("#role").val() )
        {
            alert("same");
            return false;
        }
    else if(!isValid(fname_edit) || !isValid(lname_edit))
        {
            alert("null");
            return false;
        }
    else {
        alert("can edit : "+user_edit+" : ");
        
            $.ajax({
        type: "POST",
        url: "controller/switcher.php",
    data: {
        func : 'edit_user',
        username: user_edit,
        newFname: fname_edit,
        newLname: lname_edit,
        newRole: role_edit
         },
                 success : function(data){
//                     alert("success "+data);
                     location.reload();

                 }
             
    });
        return true;
    }

        
});
    
    //click submit in del-user form
$('#model-del').click(function(){
       alert(del_user);
    $.ajax({
        type: "POST",
        url: "controller/switcher.php",
    data: {
        func : 'delete_user',
        username : del_user,
    },
        success : function(data){
                     location.reload();

                 }
    });
               
                      });
});
    


 //resetForm before pop-up create-user form
function resetForm(){
  $('#userid_create').val("");
  $('#fname_create').val("");
  $('#lname_create').val("");
  $('#role_create').val(1);
}

function editTable(button) {
    currentID = $(button).parents('tr').find('td');
    alert(currentID.eq(4).html());
    $("#usr").val(currentID.eq(1).html());
    $("#firstname").val(currentID.eq(2).html());
    $("#lastname").val(currentID.eq(3).html());
    $("#role").val(getValueRole(currentID.eq(4).html()));
}

function getValueRole(text)
{
    if(text == "Student")
        {
            return 1;
        }
    else if(text == "Teacher")
        {
            return 2;
        }
    else if(text == "Laboratory-Teacher")
        {
            return 3;
        }
    else if(text == "Admin")
        {
            return 4;
        }
}
function getUser(button) {
    var currentID = $(button).parents('tr').find('td');
    del_user = currentID.eq(1).html();
}




function toggleCheck(){
    var parBox = document.getElementById('select_all');
    if(parBox.checked == true){
        var chbox = document.getElementsByClassName('childbox');
        for(var i = 0, len = chbox.length; i < len; ++i){
            chbox[i].checked = true;
        }
    }
    else{
        var chbox = document.getElementsByClassName('childbox');
        for(var i = 0, len = chbox.length; i < len; ++i){
            chbox[i].checked = false;
        }
    }

}
function isValid(text) {


    if(/^[A-Za-z]+$/.test(text) ){
        return true;
    }
    else {
        return false;

    }
}

function isID(text) {
    if(/^[0-9]+$/.test(text) && text.length == 10){
        return true;
    }
    else {
        return false;

    }
}
