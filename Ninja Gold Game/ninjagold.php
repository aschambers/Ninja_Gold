<?php 
session_start(); 

?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>Ninja Gold</title>
	<meta charset="UTF-8">	
</head>
<style>
body {
	font-family: sans-serif;
}
.container {
	max-width: 1200px;
	margin: 0 auto;
}
.row {
	text-align: center;
	margin: 0px 45px;
}
.score h3, p {
	display: inline-block;
	margin: 15px 10px 10px 10px;
}
.score p {
	background: white;
	min-width: 60px;
	text-align: center;
	padding: 5px;
	border: 1px solid black;
}
.output {
	border: 1px solid black;
	height: 200px;
	text-align: left;
	overflow: auto;
	padding: 10px;
}
.output h3 {
	margin: 5px 10px;
}
.location {
	border: 1px solid black;
	display: inline-block;
	vertical-align: top;
	text-align: center;
	width: 250px;
	height: 220px;
	background: white;
	margin: 10px;
}
.location h2 {
	margin: 20px 30px;
}
#reset {
	margin: 15px;
}
button {
	cursor: pointer;
	background: white;
	border: 1px solid black;
	padding: 3px;
	border-radius: 5px;
}
.profit {
	color: green;
}
.loss {
	color: red;
}
</style>
<body>
	<div class="container">
		<div class="row">
			<h1>Ninja Gold Game!</h1>
			<div class="score">
				<h3>Your Gold:</h3>
				<p><?= $_SESSION['gold'] ?></p>
			</div>
			<form action="process.php" method="post" class="location">
				<input type="hidden" name="farm" value="farm">
				<h1>Farm</h1>
				<h2>(earns 10-20 golds)</h2>
				<button type="submit">Find Gold!</button>
			</form>
			<form action="process.php" method="post" class="location">
				<input type="hidden" name="cave" value="cave">
				<h1>Cave</h1>
				<h2>(earns 5-10 golds)</h2>
				<button type="submit">Find Gold!</button>
			</form>
			<form action="process.php" method="post" class="location">
				<input type="hidden" name="house" value="house">
				<h1>House</h1>
				<h2>(earns 2-5 golds)</h2>
				<button type="submit">Find Gold!</button>
			</form>
			<form action="process.php" method="post" class="location">
				<input type="hidden" name="casino" value="casino">
				<h1>Casino!</h1>
				<h2>(earns/takes 0-50 golds)</h2>
				<button type="submit">Find Gold!</button>
			</form>
			<h3>Activities</h3>
			<div class="output">
<?php 
			for($i=count($_SESSION['activities'])-1; $i>=0;$i--) 
			{
				echo $_SESSION['activities'][$i];
			}
?>	
			</div>
			<form action="process.php" method="post" id="reset">
				<input type="hidden" name="reset" value="reset">
				<button type="submit">Start New Game</button>
			</form>
		</div>
	</div>
</body>
</html>
