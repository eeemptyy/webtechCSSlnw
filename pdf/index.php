<!DOCTYPE html>
<html lang="en">

<head>
    <title>Administer</title>
    <meta charset="utf-8">
    <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
    <script>
		$(document).ready(function() {
$("#HTMLcode").val('<table border="1"><tr><th>Month</th><th>Savings</th></tr><tr><td>January</td><td>$100</td></tr><tr><td>February</td><td>$80</td></tr></table>');
			
		});
	</script>
</head>

<body>
    <form action="html2pdf.php" method="post">
    	<button type="submit">aaaa</button>
        <input type="text" value="" id="HTMLcode" name="HTMLcode"/>
    </form>
    
</body>

</html>
