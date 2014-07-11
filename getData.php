<?php

$con=mysqli_connect("127.0.0.1", "root", "root", "mysql");
if (mysqli_connect_errno())
{
	echo "Failed to connect to database: ".mysqli_connect_errno();
}

$result = mysqli_query($con, "SELECT * FROM (
	SELECT * FROM data1 ORDER BY date DESC LIMIT 7
) sub
ORDER BY date ASC;");
if (!$result) { // add this check.
    die('Invalid query: ' . mysql_error());
}

$table = array();
$table['cols'] = array (
array('id' => '', 'label' => 'Date', 'pattern' => "", 'type' => 'string'),
array('id' => '', 'label' => 'Current', 'pattern' => "", 'type' => 'number'),
array('id' => '', 'label' => 'Voltage 1', 'pattern' => "", 'type' => 'number'),
array('id' => '', 'label' => 'Voltage 2', 'pattern' => "", 'type' => 'number'),
array('id' => '', 'label' => 'Voltage 3', 'pattern' => "", 'type' => 'number')
);

$rows = array();

while ($row = $result->fetch_assoc())
{
	$temp = array();
	$temp[] = array('v' => (string)$row['date'], 'f' => NULL);
	$temp[] = array('v' => (double)$row['current'], 'f' => NULL);
	$temp[] = array('v' => (double)$row['voltage'], 'f' => NULL);
	$temp[] = array('v' => (double)$row['voltage2'], 'f' => NULL);
	$temp[] = array('v' => (double)$row['voltage3'], 'f' => NULL);
	$rows[] = array('c' => $temp);
}
$table['rows'] = $rows;

$output = json_encode($table);

mysqli_close($con);

echo $output;


?>