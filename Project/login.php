<html>
<head>
    <title>Login</title>
</head>
<body>
	<table>
		<tr>
		    <td>
		        <fieldset>
		            <legend>Login Info</legend>
		            <form action="login.php" method="post">
		                <code>Name</code>
		                <input type="text" name="name"/><br/>

		                <code>Password</code>
		                <input type="password" name="password"/><br/>

		                <input type="submit" name="buttonSubmit" value="Submit"/>
		            </form>
		        </fieldset>
		            <?php
						include 'prjfunctions.php';
						createTableUsers();
						//addDummyUsers();
						//createTableFriends();
						//addDummyFriends();
				        $name=$_POST['name']; 
						$password=$_POST['password']; 
						login($name, $password);
		            ?>
		    </td>
	</table>
</body>
</html>
