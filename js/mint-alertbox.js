function popUp(page) {
	var motherOfChbox = document.getElementById('select_all');
  	var chbox = document.getElementsByClassName('childbox');
  	var text = "Please select at least 1 element.";
  	if(motherOfChbox.checked){;
  		text="";
  		if(page=="ad"){
  			for(var i = 0, len = chbox.length; i < len; ++i){
            	if(chbox[i].checked){
              		var currentID = $(chbox[i]).parents('tr').find('td');
              		text += currentID.eq(1).html()+" "+currentID.eq(2).html()+" "+currentID.eq(3).html()+" "+currentID.eq(4).html()+"\n";
            	}
        	}
    	}
    	else if(page=="ad-course"){
    		for(var i = 0, len = chbox.length; i < len; ++i){
            	if(chbox[i].checked){
              		var currentID = $(chbox[i]).parents('tr').find('td');
              		text += currentID.eq(1).html()+" "+currentID.eq(2).html()+" "+currentID.eq(3).html()+" "+currentID.eq(4).html()+" "+currentID.eq(5).html()+"\n";
            	}
        	}
    	}
	}
	alert(text);
}