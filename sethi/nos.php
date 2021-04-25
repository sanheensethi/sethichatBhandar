<?php
if(isset($_GET['bill']))
{
$plates=$_GET['plates'];
}




if(isset($_POST['home']))
{
echo "<script>window.location.href='index.php'</script>";
}
date_default_timezone_set("Asia/Calcutta");
$t=time();
$mk1=mktime("0","0","0");
$mk2=mktime("23","59","0");
if($t==$mk1 || $t>$mk1 && $t<$mk2)
{
if($plates==1)
{
$bill=$plates*30 + 20;
$bill1="( $plates Plates X ₹30 ) + <span style='color:red;'>Service Charge ₹20</span>&nbsp;=&nbsp;"."₹".$bill;
}
else
{
$plate=$plates-1;
$bill=(1*30+20)+($plate*30+$plate*5);
if($plate==1){ $ms="Plate";}
else{$ms="Plates";}
$bill1="(1 Plate X ₹30) + <span style='color:red;'>Servive Charge ₹20</span> +"."<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."( $plate $ms X ₹30 ) + <span style='color:red;'>Service Charge ₹5</span> ( $plate Plates X ₹5 )"."<br>"."<span style='color:red;font-size:30px;'>Total Bill&nbsp; = ₹".$bill."</span>";
}
}
date_default_timezone_set("Asia/Calcutta");
$t=time();
$mk1=mktime("0","0","0");
$mk2=mktime("23","59","0");
$fg1=file_get_contents("noa.txt");
if($fg1>=1)
{
if($t==$mk1 || $t>$mk1 && $t<$mk2 )
{
$data6="

					<div id='content'>
					
					<center><label style='font-size:30px;'><i>Address Field :</i></label></center><br><br>
					<label><i>Name :</i></label>
					<input type='text' id='name' class='form-control' name='n' required/><br><br>
					
					<label style='color:blue;font-size:30px;'><u><b>Total Number of Plates :</b></u></label>
					<input type='number' min='1' max='$fr' id='name' class='form-control' name='plates' required/><br><br>
					
					<label>House Number :</label>
					<input type='text' id='name' class='form-control' name='ad1' required/><br><br>
					<label>Floor</label>
					<select class='form-control' name='floor'>
					<option name='floor'  value='GF'>Ground Floor (GF)</option>
					<option name='floor' value='FF'>First Floor (FF)</option>
					<option name='floor' value='SF'>Second Floor (SF)</option>
					</select>
					<br><br>
					<label>Near by Place Name :</label>
					<input type='text' id='name' class='form-control' name='ad2'/><br><br>
					<label>Sector : </label>
					<select class='form-control' name='sector'>
					<option name='sector'  value='Sector 24'>Sector 24</option>
					<option name='sector' value='Sector 25'>Sector 25</option>
					<option name='sector' value='Sector 26'>Sector 26</option>
					<option name='sector' value='Tribune Mitra Vihar'>Tribune Mitra Vihar</option>
					<option name='sector' value='Sector 27'>Sector 27</option>
					<option name='sector' value='Sector 28'>Sector 28</option>
					</select>
					
					<br><br>
				<!--	<input type='radio' id='name' class= placeholder='Example : Manveer Sandhu' name='Sector_24'/>Yes
					<input type='radio' id='name' class= placeholder='Example : Manveer Sandhu' name='Sector_24'/>No<br>-->
					<label>City :</label>
					<input type='radio' id='name' name='city' value='Panchkula' checked/><span style='font-size:30px;'>Panchkula</span>
					<br><br>
			     	<label><i>Mobile Number :</i></label>
					<input type='number' maxlength='10' id='name' class='form-control' name='m' required/>
				  
					<br>
					

";
}
else{
$data6="<span style='color:red;font-size:30px;'><b>Order Time Is Between 6:00 PM to 8:00 PM</b></span>";
}
}
else{
$data6="<center><span style='color:red;font-size:30px;'><b>Address Form will be Shown When orders are Present</b></span></center>";
}

if(isset($_GET['s']))
{
if($t==$mk1 || $t>$mk1 && $t<$mk2)
{
$plates=$_GET['plates'];
$n=$_GET['n'];
$ad1=$_GET['ad1'];
$ad2=$_GET['ad2'];
$floor=$_GET['floor'];
$sector=$_GET['sector'];
$city=$_GET['city'];
$m=$_GET['m'];



 /*$name= $_GET["ing"];
 $ranges= $_GET["range"];
   echo "You chose the following color(s): <br>";
 
   foreach ($name as $ing){
  
   echo $ing."<br>";
   $fo=fopen("$a order.txt","a+");
   fwrite($fo,$ing);
   }
  
   
   foreach ($ranges as $range){
   echo $range."<br>";
   }*/

$a = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 8);

/*$name= $_GET["ing"];
 $ranges= $_GET["range"];
   echo "You chose the following color(s): <br>";
 
   foreach ($name as $ing){
  
   echo $ing."<br>";
   $h=$ing;
   $fo=fopen("$a order.txt","a+");
   fwrite($fo,$h."\n\n");
   }
  
   
   foreach ($ranges as $range){
   echo $range."<br>";
   fwrite($fo,$range);
   }*/

$date=date("d-m-Y");
$fo=fopen("normal/".$date."_normal_order.txt","a+");
$fo1=fopen("normalhtml/".$date."_normal_order.html","a+");
$plates=$_GET['plates'];
$fg=file_get_contents("noa.txt");
$newplates=$fg-$plates;
file_put_contents("noa.txt",$newplates);

if($plates==1)
{
$bill=$plates*30 + 20;
$bill1="( $plates Plates X ₹30 ) + <span style='color:red;'>Service Charge ₹20</span>&nbsp;=&nbsp;"."₹".$bill;
}
else
{
$plate=$plates-1;
$bill=(1*30+20)+($plate*30+$plate*5);
if($plate==1){ $ms="Plate";}
else{$ms="Plates";}
$bill1="(1 Plate X ₹30) + <span style='color:red;'>Servive Charge ₹20</span> +"."<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."( $plate $ms X ₹30 ) + <span style='color:red;'>Service Charge ₹5</span> ( $plate Plates X ₹5 )"."<br>"."<span style='color:red;font-size:30px;'>Total Bill&nbsp; = ₹".$bill."</span>";
}


$data="
Order ID : #$a\n
Date : $date;\n
Plates : $plates\n
Bill : ₹$bill\n\n
   
   Ingredients\n

$ih

Name : $n\n
Address : \n\r\r
# $ad1 $floor Near $ad2 Sector $sector City $city\n
Mobile Number : $m\n
";
$data2="<br><br><hr><hr>
<h1><u><i>Your Order Have Been Placed Now , Thankyu For Coming.</i></u></h1>
<h1>Order ID :<span style='color:#772020'> #$a</span><br>
Date : <span style='color:#772020'>$date</span><br>
Plates : <span style='color:#772020'>$plates</span><br>
Bill : <span style='color:#772020'>₹ $bill</span><br>
Name : <span style='color:#772020'>$n</span><br>
Address : <br><b><span style='color:#772020'>
# $ad1 $floor Near $ad2 Sector $sector City $city</span><br>
Mobile Number : <span style='color:#772020'>$m</span><br>
<br>
<span style='color:red;'>Thankyu for your order , We will deliver <span style='color:#772020'>Before 8:30 PM</span></span><br>
If you type anything wrong just call on <span style='color:#772020'>8360638695</span>
<br><br>SETHI CHAT BHANDAR
<br><br><hr><hr>";
$data3="<br><br><hr><hr><b>
<span style='color:red;'>Order ID</span> : <b>#$a</b><br>
<span style='color:red;'>Date</span> : <b>$date</b><br>
<span style='color:red;'>Plates</span> : <b>$plates</b><br>
<span style='color:red;'>Bill</span> : <b>₹$bill</b><br>
<br><br>
Ingredients<br><br>
$ih
<br>
<span style='color:red;'>Name</span> : <b>$n</b><br>
<span style='color:red;'>Address</span> : <br><b>
# $ad1 $floor Near $ad2 Sector $sector City $city<br>
<span style='color:red;'>Mobile Number</span> : $m<br>
<br></b>";
fwrite($fo,$data."\n\n");
fwrite($fo1,$data3);
$name= $_GET["ing"];
 $ranges= $_GET["range"];
   
 
   foreach ($name as $ing){
  
   
   fwrite($fo,$ing."\n\n");
   fwrite($fo1,$ing."<br><hr width='50%'>");
   }
  
   
   foreach ($ranges as $range){
   
   fwrite($fo,$range."\n\n");
   fwrite($fo1,$range."<br><hr><hr>");
   }
//fwrite($fo,$data."\n\n");
//fwrite($fo1,$data3);
}
else{
echo "<script>alert('Order Time Is Between 6:00 PM to 8:00 PM');</script>";
}
}

?>
<html>
<head>

<link rel="stylesheet" href="css/index.css">
<style>
/*.rd
{
height: 30px;
   width: 30px;
   display: inline-block;
   cursor: pointer;
   vertical-align: middle;
   background: #FFF;
   border: 1px solid #d2d2d2;
   border-radius: 100%;
}*/


input[type="radio"] {
   height: 25px;
   width: 25px;
   display: inline-block;
   cursor: pointer;
   
   background: red;
   border: 1px solid green;
   border-radius: 100%;
}

input[type="radio"]:hover {
    border-color: green;
}

input[type="radio"]:checked{
    background-color:green;
}
</style>
</head>
<body onload="alert('Hello ! Sir/Madam , Welcome To the SETHI CHAT BHANDAR.\n\nORDER TIME : EVERYDAY 5:00 PM TO 8:00PM');">
<div id="wrapper-o">
<!--<marquee><img src="paytm.jpg"></marquee>-->
<center><h1 style="color:#5358ab;font-size:50px;margin-top:30px;">SCB</h1></center>
<marquee><u><h1 style="color:red;font-size:70px;margin-top:-10px;">SETHI CHAT BHANDAR</h1></u></marquee>
<hr width=20%>
<center><h1 style="color:#5358ab;">Your Bill.</h1></center>
<hr width=50%>
<form method="post">
<input type="submit" id="dwnl" name="home" value="Home">
</form>
<h1>
<?php echo "No of Plates : ".$plates; ?>
<br>
<?php echo "Bill : ". $bill1; ?></span>
<br>
<hr width=50%><center>Cash On Delivery</center><hr width=50%>
<?php echo $data2; ?>
</h1>
<form action="" method="get">

   
   <?PHP
   
    
   
    
    
  
    for($i=1;$i<=$plates;$i++){ 
    
    $msg="
    
    
  
    <center><div style='float:center;font-size:28px;border:1px solid green;' class='form-c'>
   <br><span style='color:red;'><u><b>For Plate $i</b></u> </span><br>
    Red Sauce<input type='checkbox' name='ing[]' id='color' value='For Plate $i Red Sauce'>&nbsp&nbsp;Range : LOW <input type='checkbox' name='range[]' id='color' value='For Plate $i Red Sauce Range :: LOW'>&nbsp&nbsp;NORMAL <input type='checkbox' name='range[]' id='color' value='For Plate $i Red Sauce Range :: NORMAL'>&nbsp&nbsp;HIGH <input type='checkbox' name='range[]' id='color' value='For Plate $i Red Sauce Range :: HIGH'>&nbsp&nbsp;<br>
    Green Sauce<input type='checkbox' name='ing[]' id='color' value='For Plate $i Green Sauce'>&nbsp&nbsp;Range : LOW <input type='checkbox' name='range[]' id='color' value='For Plate $i Green Sauce Range :: LOW'>&nbsp&nbsp;NORMAL <input type='checkbox' name='range[]' id='color' value='For Plate $i Green Sauce Range :: NORMAL'>&nbsp&nbsp;HIGH <input type='checkbox' name='range[]' id='color' value='For Plate $i Green Sauce Range :: HIGH'>&nbsp&nbsp;<br>
    Curd<input type='checkbox' name='ing[]' id='color' value=' For Plate $i Curd'>&nbsp&nbsp;Range : LOW <input type='checkbox' name='range[]' id='color' value='For Plate $i Curd Range :: LOW'>&nbsp&nbsp;NORMAL <input type='checkbox' name='range[]' id='color' value='For Plate $i Curd Range :: NORMAL'>&nbsp&nbsp;HIGH <input type='checkbox' name='range[]' id='color' value='For Plate $i Curd Range :: HIGH'>&nbsp&nbsp;<br>
    Spicy<input type='checkbox' name='ing[]' id='color' value=' For Plate $i Spicy'>&nbsp&nbsp;Range : LOW <input type='checkbox' name='range[]' id='color' value='For Plate $i Spicy :: LOW'>&nbsp&nbsp;NORMAL <input type='checkbox' name='range[]' id='color' value='For Plate $i Spicy :: NORMAL'>&nbsp&nbsp;HIGH <input type='checkbox' name='range[]' id='color' value='For Plate $i Spicy :: HIGH'>&nbsp&nbsp;<br>
    Papdi<input type='checkbox' name='ing[]' id='color' value='For Plate $i Papdi'><br>
    Aalu<input type='checkbox' name='ing[]' id='color' value='For plate $i Aalu'><br>
    Bondi<input type='checkbox' name='ing[]' id='color' value='For Plate $iBundi'><br>
  </div></center>
   
   
  
    
   
    
    ";
    
    if($t==$mk1 || $t>$mk1 && $t<$mk2 )
    {
   
    echo $msg;
    
    }
   
    else
    {
    echo $data6;
    }
    
    }
   echo "</div>";
   
    
    ?>
  
   <div class="form-c">
   
    <?php echo $data6; ?>
				
					<input type='submit' id='dwnl' class='pull' name='s' value='Order' >
					<input type='reset' id='dwnl' class='pull' name='r' value='Reset' >
					</form>
					</div>
					</body>
					</html>