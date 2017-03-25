
    //data for province combobox
$(document).ready(function(){

var data = [ [ 5610404452, "John" , "Smith" , "Student" ]];

var html = '<table class="table table-hover table-bordered"><thead><tr><th><input type="checkbox" id="select_all" value=""> All</th><th>Username ID</th><th>Firstname</th><th>Lastname</th><th>Position</th><th></th></tr></thead><tbody>';
for (var i = 0, len = data.length; i < len; ++i) {
    html += '<tr>';
    html += '<td><input class="checkbox" type="checkbox" value=""></td>'
    for (var j = 0, rowLen = data[i].length; j < rowLen; ++j ) {
        
        html += '<td>' + data[i][j] + '</td>';
    }
    html += '<td><input type="button" id="edit" alt="Edit" data-toggle="modal" data-target="#editModal" value="" value=""><input type="button" id="delete" alt="Delete" data-toggle="modal" data-target="#deleteModal" value=""></td>';
    html += "</tr>";
}
html += '</tbody><tfoot><tr></tr></tfoot></table>';

$(html).appendTo('#table');


//mint's section
    $("#select_all").change(function(){ 
    	$(".checkbox").prop('checked', $(this).prop("checked"));
	});
	$('.checkbox').change(function(){ 
    	if(false == $(this).prop("checked")){
        	$("#select_all").prop('checked', $(this).prop("checked")); 
    	}
    	if ($('.checkbox:checked').length == $('.checkbox').length ){
        	$("#select_all").prop('checked', true);
    	}
	});

});
   
