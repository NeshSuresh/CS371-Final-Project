<!doctype html>
<?php
// Turn off all error reporting
error_reporting(0);
//include 'prjfunctions.php';
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Stopwatch</title>
	<link rel = "stylesheet"
   type = "text/css"
   href = "style.css" />
	<script src = "stopwatch.js"></script>
</head>
<ul class="topnav">
  <li><a href="ADAD.php">ADAD</a></li>
  <li><a href="reg.php">Register</a></li>
  <li class="icon">
    <a href="javascript:void(0);" onclick="myFunction()">&#9776;</a>
  </li>
</ul>

<body onload="show();">

<table>
<tr>
	<td>
	<h1> Another Day Another Dollar</h1>
	<div id= mod>
	
	<form id="form1"  >
			
					Hourly pay:<input type="Number" id = pay value = 0 style="margin:2px"/><br/><br/>
					User Name:<input type="text" name = user id = user style="margin:2px"/><br/><br/>
            		
</form>
<button class= "button button2" onclick="setHourlyPay()">Set Hourly Pay</button>
	<div><h2>Time: <span id="time"></span></h2></div>
	<div><h2>Cash: $ <span id="money"></span></h2></div>
	<input class ="button button1" type="button" value="Clock In" onclick="start();">
	<input class = "button button2" type="button" value="Break/Stop" onclick="stop();">
	<input class = "button button3" type="button" value="reset" onclick="reset();">
	<input class = "button button1" type="button" value="Submit" onclick="submit();">
	</td>	
	<td>
	<form method= "post">
	<input type="text" id = insert name = insert style="margin:2px"/><br/><br/>
	<input class = "button button1" type="submit" name = "confirm" value="Confirm" onclick="submit();">
	</form>
</td>
	</tr>
	
	</table>	

<?php
	
	include 'prjfunctions.php';
	echo $_POST['insert'];
	//echo "hgjhg";
	 if(isset($_POST['confirm'])){
	
	insert($_POST['insert']);
	getall("sureshv");
	}

	?> 
</body>
</html>
