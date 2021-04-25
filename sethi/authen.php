<?php
	
	require 'db.php';
	$user = $_POST['user'];
	$pass = $_POST['pass'];

	try{
		$stmt = $db->prepare("SELECT count(*) as count FROM admin WHERE user='".$user."' && pass='".$pass."'");
		$stmt->execute();
		$row = $stmt->fetchAll(PDO::FETCH_OBJ);
		if(((int)$row[0]->count) == 1){
			echo "<script>
				window.location.href='adminHome.html';
			</script>";
		}else{
			echo "<span style='color:#f00'>Wrong Username or Password.</span>";
		}
	}catch(PDOException $e){
		echo $e->getMessage();
	}
?>