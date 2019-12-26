<?php
$servername = "localhost";
$username = "<username>";
$password = "<password>";
$conn  = new mysqli($servername, $username, $password, "<table_name>");
session_start();
?>

<html>
<head>
	<title></title>
</head>
<body>
	<?php

    $sql = "select * from Unprocessed where MachineID='".$_SESSION['uname']."';";
    $OrderNos = array();
    $OrderNames = array();
    
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);
	$i = 0;
	if($resultCheck>0)
	{
		while($row=mysqli_fetch_assoc($result))
		{$OrderNos[$i] = $row['OrderNo'];
		$OrderNames[$i] = $row['OrderName'];
		$i++;}
	}
	$k=0;
	for($j=0; $j<$i; $j++)
	{
	    if($OrderNos[$j]===min($OrderNos))
	     {   $k = $j;
	        break;
	        }
	}
    
	$sql1 = "delete from Unprocessed where OrderNo=".$OrderNos[$k].";";
	$sql2 = "insert into Processed values(".$OrderNos[$k].",'".$_SESSION['uname']."','".$OrderNames[$k]."');";
	if ($conn->query($sql1) === TRUE&&$conn->query($sql2) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

echo $_SESSION['uname'];

$conn->close();
	?>

</body>
</html>
