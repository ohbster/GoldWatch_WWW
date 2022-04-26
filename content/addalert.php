<style>
p   {
    font-familiy: Verdana;
    text-align: center;}
h1  {
    color: #fefefe;
    font-size: 32px;}
h2  {
    color: #fdda5c;
    font-size: 32px;}
h4  {
    color: #fefefe;}
body {
    background-color: #212121;}
a:link { 
    color: #fdda5c;
    text-decoration: none;}
a:visited { 
    color: #fdda5c;
    text-decoration: none;}
a:hover { 
    color: #fdda5c;
    text-decoration: none;}
a:active { 
    color: #fdda5c;
    text-decoration: none;}
label {
    color: #fefefe;
    }
</style>

<html>
<head> 
	<title>Add an Alert</title> 
</head>
<body>
	<form action="insert.php" method="post">
		<p>
			<label for="email">Email Address:</label>
			<input type="text" name="email" id="Email">
		</p>
		<p>
			<label for="pricetarget">Price Target:</label>
			<input type="text" name="pricetarget" id="PriceTarget">
		</p>
		<p>
		<input type="submit" value="Submit">
		</p>	
	</form>
</body>
</html>