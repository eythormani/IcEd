<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>

</body>
</html>
<?php
require 'kickOut.php';
require 'dbCon.php';
$array = ['omar','benni','maninthecloset'];

function GetUploadsByTags($array){
	// You get and array and you want to create an select command from that array of tags
	$SQL = "SELECT * FROM uploads join uploadTags on(uploadTags.uploadID = uploads.ID) join tags on(uploadTags.tagID = tags.ID) WHERE tags.name = '".$array[0]."'";

	for ($i=1; $i < sizeof($array); $i++) {
		$SQL .= " OR tags.name = '".$array[$i]."'";
	}
	 $SQL .= " LIMIT 30;";
	// here the funct6ion will go on and query the database
	}

function ChangeUserData($changedData){
	require 'dbCon.php';
		$SQL = "UPDATE users SET name = '".$changedData['name']."',address = '".$changedData['address']."', email = '".$changedData['email']."', phone = '".$changedData['phone']."' WHERE id = '".$_SESSION['username']."'";
		$variable = $pdo -> prepare($SQL);
		$variable -> execute();
	}
function checkTagExist($userinput, $icelandicLetters){
	// Get essential database connections
	require 'dbCon.php';
	// forge the query
	$SQL = "SELECT name ID FROM tags where name like '".$userinput."%' LIMIT 1";
	$query = $pdo -> prepare($SQL);
	$row = $query -> execute();
	$return = [$row['name'],$row['ID']];
	echo $return;
}

?>
