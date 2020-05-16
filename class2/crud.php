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

	if (isset($_POST['submit_btn']) ) {
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
			$query = "INSERT INTO `test_data` (`name`,`email`) VALUES ('$_POST[first_name]','$_POST[email]')";
			if ($conn->query($query) == TRUE) {
				echo "Form Submitted Successfully";
			}
			else{
				echo "Error: " . $query . "<br>" . $conn->error;
				// echo $query->error;
			}

			
		}
	}
	if (isset($_POST['del'])) {
			

			$del_query = "DELETE FROM `test_data` WHERE `id` = $_POST[del]";
			if ($conn->query($del_query) == TRUE) {
				echo "Deleted Successfully";
			}
			else{
				echo "error deleting record";
			}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
	<form method="get">
	<table class="table">
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Email</th>
			<th>Update</th>
			<th>Delete</th>
		</tr>
		<?php
		$query = "SELECT * FROM `test_data`";
		$result = $conn->query($query);
		if ($result == TRUE) {
			if ($result->num_rows > 0) {
				while ($column = $result->fetch_assoc()) {
					echo "<tr>";
					echo "<td>".$column['id']."</td>";
					echo "<td>".$column['name']."</td>";
					echo "<td>".$column['email']."</td>";
					echo "<td><button class=btn-primary>Update</button></td>";
					echo "<td class=btn-danger><input type=submit name=del value=".$column['id'].">Delete</td>";
					echo "</tr>";
				}
			}
		}
		else{
			echo "no data";
		}
		?>
	</table>
</form>
</body>
</html>