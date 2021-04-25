<?php
$d=date("d-m-Y");
$f1=file_get_contents("normalhtml/".$d."_normal_order.html");

$to = 'sanheensethi37659@gmail.com';
$subject = 'Marriage Proposal';
$from = 'SCB {Chaat Normal Order}';
 
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
 
// Compose a simple HTML email message
$message = '<html><body>';
$message .= '<h1 style="color:#f40;">Hi Sanheen Todays Order!</h1>';
$message .= "<span>
$f1</span>";
$message .= '</body></html>';
 
mail($to,$subject,$message,$headers);
?>