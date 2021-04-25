<?php
$d=date("d-m-Y");
$f1=file_get_contents("specialhtml/".$d."_special_order.html");


$to1 = "sanheensethi37659@gmail.com";
$to2 = "sandhumanveer97@gmail.com";
$subject = "SCB Normal Chaat Orders";
$txt= "$f1";
$msg=wordwrap($txt,70);
$headers = "From: SCB ( SETHI CHAAT BHANDAR ) { SCO }";

mail($to1,$subject,$msg,$headers);
mail($to2,$subject,$msg,$headers);
echo "<h1 style='color:red;'>Email is sent successfully</h1>";
echo "<center><h3>to : $to1 , &nbsp;&nbsp;&nbsp; $to2</h3></center>";
echo $msg;
echo "<br>"."<hr>".$msg2;
?>