<?php 

//console.log("MenuNameService.php?name works");
header('Cache-Control: no-cache');
header('Content-Type: application/json');


require_once '../DBRugbyFuncs.php';
$results=array();
$name=$_GET['name'];

$pdo = connectDB();
	$query = "SELECT * FROM events WHERE event_name like \"%$name%\";";
	$result = $pdo->query($query);

	while ($row = $result->fetch()) 
	{
		$n=$row["event_name"];
		$t=$row["event_date"];
		$item=array("event_name"=>$n,  "event_date"=>$t);
		array_push($results, $item);
	}
	if(count($results)==0)
	{
		$results["event_name"]="Not found!";
	}
	$jsonData=json_encode($results);
	error_log(print_r($results, TRUE));
	echo $jsonData;
	