<?php

$servername = "localhost";
$username 	= "root";
$password 	= "";
$db 		= "testing";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

	if (isset($_POST['submit_btn'])) {
		$errors = 0;
		if (empty($_POST['first_name'])) {
			$fname_err = "First name required";
			$errors++;
		}
		if (empty($_POST['email'])) {
			$email_err = "Email is required";
			$errors++;
		}
		if ($errors == 0) {
			$query = "INSERT INTO `test_data` (`name`,`email`) VALUES ($_POST[first_name],$_POST[email])";
			if ($conn->query($query) == TRUE) {
				echo "Form Submitted Successfully";
			}
			else{
				echo "Error: " . $query . "<br>" . $conn->error;
				// echo $query->error;
			}

			
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post">
		<input type="text" name="first_name" >
		<error>
			<?php 
			echo (isset($fname_err))? $fname_err : '';
			 ?>
			</error>
		<input type="text" name="email">
		<error>	<?php 
			echo (isset($email_err))? $email_err : '';
			 ?></error>
		<input type="submit" name="submit_btn">
	</form>
</body>
</html>