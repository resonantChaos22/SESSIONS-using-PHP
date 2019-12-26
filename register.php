<?php
$servername = "localhost";
$username = "id10864491_yash";
$password = "beerwine";
$conn  = new mysqli($servername, $username, $password, "id10864491_bog");
session_start();

  $hash = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
  echo "ok";
	$sql = "INSERT INTO `Machines` (`Machine_ID`, `Password`) VALUES ('".$_POST['uname']."', '".$hash."');";
	if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
   

?>
<a href='index.html'>Login</a>