<?php
$d=date("d-m-Y");
$f1=file_get_contents("normalhtml/".$d."_normal_order.html");


$to1 = "sanheensethi37659@gmail.com";
$to2 = "sandhumanveer97@gmail.com";
$subject = 'SCB~(NCO)';
$from = 'SETHI~CHAT~BHANDAR@SETHISAAB.com';
 $msg2="$f1";
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
 
// Compose a simple HTML email message
$message = '<html><body>';
$message .= '<h1 style="color:#f40;">Hi Boys !</h1>';
$message .= "$f1";
$message .= '</body></html>';

mail($to1,$subject,$message,$headers);
mail($to2,$subject,$message,$headers);


echo "<h1 style='color:red;'>Email is sent successfully</h1>";
echo "<center><h3>to : $to1 , &nbsp;&nbsp;&nbsp; $to2</h3></center>";
echo $msg;
echo "<br>"."<hr>".$msg2;
?>