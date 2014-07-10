<?php

$con=mysqli_connect("127.0.0.1", "root", "root", "mysql");
if (mysqli_connect_errno())
{
	echo "Failed to connect to database: ".mysqli_connect_errno();
}

$date = date('Y-m-d H:i:s');
$v = $_GET['volt'];
$c = $_GET['curr'];

$res = mysqli_query($con, "INSERT INTO data1 (date,voltage,current) 
VALUES ('$date','$v','$c')") or die('Error inserting into db');

mysql_close($con);

?>

<html>
<body>
	<?php echo date('Y-m-d H:i:s') ?> <br>
	<?php echo $_GET['volt'] ?> <br>
	<?php echo $_GET['curr'] ?>
	<?php echo $res ?>
</body>
</html>