function popUp() {
  var chbox = document.getElementsByClassName('childbox');
  var text = "";
  for(var i = 0, len = chbox.length; i < len; ++i){
            if(chbox[i].checked){
              var currentID = $(chbox[i]).parents('tr').find('td');
              text += currentID.eq(1).html()+" "+currentID.eq(2).html()+" "+currentID.eq(3).html()+" "+currentID.eq(4).html()+"\n";
            }
        } 
  alert(text);
}