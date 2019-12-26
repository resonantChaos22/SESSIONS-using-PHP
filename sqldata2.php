<?php
$servername = "localhost";
$username = "<username>";
$password = "<password>";
$conn  = new mysqli($servername, $username, $password, "<database_name>");
	        session_start();


?>

<html>
<body>
	<?php

            $sql = 'select * from Machines;';
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);
			
			while($row=mysqli_fetch_assoc($result)){
			if($_POST['uname']==$row['Machine_ID']&& password_verify($_POST['pwd'],$row['Password'] ))
			{
			$_SESSION['uname'] = $_POST['uname'];
			$sql = "select * from Unprocessed where MachineID='".$_POST['uname']."';";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);

			if($resultCheck>0)
				while($row = mysqli_fetch_assoc($result))
					echo "<p>".$row['OrderNo']." ".$row['OrderName']."</p>";
			}

		}


	?>

		<form action='change1.php' method='POST'>
			<table align='center'>
				<tr>
					<td align="right" colspan="2"><input type="submit" name="change" value="change"></td>
				</tr>
			</table>
		</form>
	
	
	
	
	
	
	
	
	<a href='logout.php'>Logout</a>
</body>
</html>
