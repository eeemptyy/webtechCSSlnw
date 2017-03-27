function printPDF(){
			var num = $("#mydatatable tbody").find("tr").length;
			var str ="";
			str += '<table border="1"><thead><tr><th align="center">Role</th><th align="center">Firstname</th><th align="center" >Lastname</th><th align="center">UsernameID</th><th align="center">Password</th></tr></thead><tbody>';
			
			
			for(var i=0 ; i < num ; i++){
				//console.log("Count: "+i)
				var ck = $("#check_"+i).is(':checked');
				if(ck){
					var role = $("#mydatatable tbody").find("tr").eq(i).find("td").eq(4).text()
					var fname = $("#mydatatable tbody").find("tr").eq(i).find("td").eq(2).text()
					var lname = $("#mydatatable tbody").find("tr").eq(i).find("td").eq(3).text()
					var id = $("#mydatatable tbody").find("tr").eq(i).find("td").eq(1).text()
					str += '<tr>';
					str += '<td height="80">' + role + '</td>' + '<td>' + fname + '</td>' + '<td>' + lname + '</td>' + '<td>' + id + '</td>' + '<td>' + "" + '</td>';
					str += '</tr>';
				}
				
			}
			
			str += '</tbody></table>';
			//console.log(str)
			//<table border="1"><tr><th>Month</th><th>Savings</th></tr><tr><td>January</td><td>$100</td></tr><tr><td>February</td><td>$80</td></tr></table>
			$("#HTMLcode").val(str);
			//console.log($("#tabletopdf tbody").find("tr").eq(0).find("td").eq(1).text())
			$('#btPDF').click();	
}

