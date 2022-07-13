
<html>
<head>
<meta http-equiv = "refresh" content = "300; url = https://www.goldwatch.link"/> 
	<title>Add an Alert</title>
	<script>
    function validateForm() {
      let x = document.forms["gw-addalertform"]["email"].value;
      let current_price = parseFloat(sessionStorage.getItem('current_price')).toFixed(2);
      
      if (x == "") {
        alert("Name must be filled out");
        return false;
      }
      let y = document.forms["gw-addalertform"]["pricetarget"].value;
      if (y > current_price) {
      	alert("Must be less than $" + current_price);
        return false;
        }
}
</script> 
<link rel="stylesheet" href="mainstyle.css">
</head>
<body><h2><p>Current Price: $<span id="curprice"></span></p></h2>
<script>document.getElementById("curprice").innerHTML = parseFloat(sessionStorage.getItem("current_price")).toFixed(2);</script>
	<form name="gw-addalertform" action="insert_lo.php" onsubmit="return validateForm()" method="post">
		<p>
			<label for="email">Email Address:</label>
			<input type="text" name="email" id="Email" placeholder="name@example.com" pattern="(\w\.?)+@[\w\.-]+\.\w{2,}">
		</p>
		<p>
			<label for="pricetarget">Price Target:</label>
			<input type="number" step=0.01 name="pricetarget" placeholder="Less than current price" id="PriceTarget">
		</p>
		<p>
		<input type="submit" value="Submit">
		</p>	
	</form>
</body>
</html>