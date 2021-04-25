<?php
require 'db.php';
if($_POST['address']!=''){
	/*All Logic*/
	$golgappe = (int)$_POST['golgappe'];
	$bhalla = (int)$_POST['bhalla'];
	$papdi = (int)$_POST['papdi'];
	$tikki = (int)$_POST['tikki'];
	$name = $_POST['name'];
	$mobile = $_POST['mobile'];
	$address = $_POST['address'];

	$golRate = 20;
	$bhallaRate = 40;
	$tikkiRate = 40;
	$papdiRate = 40;

	$total_bill = $golgappe*$golRate + $bhalla*$bhallaRate + $papdi*$papdiRate + $tikki * $tikkiRate;
	/*By default Request*/
	$request = 0;
	/*Insert Data in DataBase*/
	try{
  $stmt = $db->prepare("INSERT INTO orders VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
  $values=["",$mobile,$name,$address,$golgappe,$bhalla,$papdi,$tikki,$total_bill,$request,$date,$time,$date." ".$time];
  if($stmt->execute($values)){
  	echo "Order Placed.";
  }else{
  	echo "<span style='color: #f00'>Something Wrong, call at 9876354151,6280364928,8360638685</span>";
  }
}catch(PDOException $e){
   echo $e->getMessage();
 }

}else{
	echo "<h3 style='color:#f00'>Address Required.</h3>";
}

?>