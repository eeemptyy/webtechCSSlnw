function printPDFStd(){
			var num = $("#mydatatable tbody").find("tr").length;
			var str ="";
			str += '<table border="1"><thead><tr><th align="center">Role</th><th align="center">Firstname</th><th align="center" >Lastname</th><th align="center">UsernameID</th><th align="center">Password</th></tr></thead><tbody>';
			
			console.log(num)
			for(var i=0 ; i < num ; i++){
				//console.log("Count: "+i)
				var id = $("#mydatatable tbody").find("tr").eq(i).find("td").eq(0).find('span').text();
				console.log(id)
				var ck = $("#check_"+id).is(':checked');
				
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


function printPDFCourse(){
			var num = $("#datatable tbody").find("tr").length;
			var str ="";
			str += '<table border="1"><thead><tr><th width="400" align="center">Coruse ID</th><th width="900" align="center" >Coruse Name</th><th width="155" align="center">Credit</th><th width="320" align="center">Teacher ID</th><th width="770" align="center">Teacher Name</th></tr></thead><tbody>';
			
			console.log(num)
			for(var i=0 ; i < num ; i++){
				//console.log("Count: "+i)
				var id = $("#datatable tbody").find("tr").eq(i).find("td").eq(0).find('span').text();
				console.log(id)
				var ck = $("#check_"+id).is(':checked');
				
				if(ck){
					var courseID = $("#datatable tbody").find("tr").eq(i).find("td").eq(1).text()
					var courseName = $("#datatable tbody").find("tr").eq(i).find("td").eq(2).text()
					var credit = $("#datatable tbody").find("tr").eq(i).find("td").eq(3).text()
					var teacherID = $("#datatable tbody").find("tr").eq(i).find("td").eq(4).text()
					var teacherName = $("#datatable tbody").find("tr").eq(i).find("td").eq(5).text()
					str += '<tr>';
					str += '<td width="400" height="80">' + courseID + '</td>' + '<td width="900">' + courseName + '</td>' + '<td th width="155">' + credit + '</td>' + '<td width="320">' + teacherID + '</td>' + '<td width="770">' + teacherName + '</td>';
					str += '</tr>';
				}
				
			}
			
			str += '</tbody></table>';
			console.log(str)
			//<table border="1"><tr><th>Month</th><th>Savings</th></tr><tr><td>January</td><td>$100</td></tr><tr><td>February</td><td>$80</td></tr></table>
			$("#HTMLcode").val(str);
			//console.log($("#tabletopdf tbody").find("tr").eq(0).find("td").eq(1).text())
			$('#btPDF').click();	
}

