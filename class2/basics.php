<?php
$first_name = "Saqib";
$last_name = "Ali";
echo $first_name." ".$last_name;
	
	if (isset($_POST['submit'])) {
		$number = $_POST['num'];
		$range 		= $_POST['range'];
for ($i=1; $i <= $range ; $i++) { 
		echo $number*$i;
		echo "<br>";
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
	<input type="number" name="num">
	<input type="number" name="range">
	<input type="submit" name="submit">
</form>
</body>
</html>


<?php
			$number = 0;
			while ( $number <= 10) {
						echo $number;
						$number++;
						echo "<br>";
					}
 $myarray = array('saddam','bilal','saqib','faizan','tahir');

 foreach ($myarray as $index => $value) {
 	echo $myarray[$index];
 	// Skip faizan from this array
 	echo "<br>";
 }


$myarray = array(
	0	=>'saddam',
	3	=>'bilal',
	2	=>'saqib',
	4	=>'tahir',
		'faizan');
echo $myarray[5];





























