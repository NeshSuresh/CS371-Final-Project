<?php
// Turn off all error reporting
error_reporting(0);
?>
<html>
<head>
    <title>Register</title>
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
<body>
<?php
		include 'prjfunctions.php';
		createTableUsers();
		//createTableRecord();
		//createTableRecord()
		//addDummyUsers();
		//addData();
		//getAll($_SESSION['name']);
	?>

	<h1>Register</h1>

	<table>
		<tr>
		    <td id="post">
				
		            <legend>User Info</legend>
		            <form action="reg.php" method="post">
		                <code>User</code>
		                <input type="text" name="userName"/><br/>
						<code>Name</code>
		                <input type="text" name="name"/><br/>

		                <code>Password</code>
		                <input type="text" name="password"/><br/>

		                <input type="submit" name="buttonSubmit" value="Submit"/>

		                </form>
		        </fieldset>
<?php
    
	
    $user =$_POST['userName'];
    $pass =$_POST['password'];
 $name =$_POST['name'];
    if($user =="" || $pass=="" ||$name == ""){
	}
	else{
	$conn = connect();
	$sql = "insert into prjusers(user, password,name) values ('$user', '$pass','$name')";
	$result = $conn->query($sql);
}

    
?>
			

		       
		    </td>
	</table>

	

</body>
</html>
