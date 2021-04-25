<?php
	require 'inidb.php';
	try{
		$db = @new PDO("mysql:host=".$server.";dbname=".$dbname,$username,$pass);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->exec("SET names utf8");
	/*	$db->exec("SET character_set_client=utf8");
		$db->exec("SET character_set_results=utf8");
		$db->exec("SET character_set_connection=utf8");
		$db->exec("SET collation_connection=utf8_general_ci");*/
	}catch(PDOException $e){
		echo $e->getMessage();
	}
$date = date_default_timezone_set('Asia/Kolkata');
$dt=date("Y-m-d H:i:s");
$date=date("Y-m-d");
$time=date("H:i:s");
function secure($data){
		return htmlentities(htmlspecialchars(trim($data," ")));
	}
?>