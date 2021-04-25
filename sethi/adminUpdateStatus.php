<?php
  require 'db.php';
  $orderID = (int)$_POST['orderid'];
  $status =(int)$_POST['status'];
  try{
  	$stmt = $db->prepare("UPDATE orders SET request=".$status." WHERE orderID=".$orderID);
  	if($stmt->execute()){
  		echo "<script>
  			window.location.href='adminHome.html';
  		</script>";
  	}else{
  		echo "<span style='color:#f000'>Not Updated</span>";
  	}
  }catch(PDOException $e){
  	echo $e->getMessage();
  }
?>