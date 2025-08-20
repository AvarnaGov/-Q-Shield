<?php
include("dbconnect.php");
extract($_REQUEST);
$rdate=date("d-m-Y");

$q1=mysql_query("select * from re_user_files where id=$fid");
	 $r1=mysql_fetch_array($q1);
	 $uu=$r1['uname'];
	 $fname=$r1['upload_file'];
$q2=mysql_query("select * from re_register where uname='$uu'");
	 $r2=mysql_fetch_array($q2); 
	 $mobile=$r2['mobile'];


$ip = $_SERVER['REMOTE_ADDR'];
//////MAC Address////////
ob_start();
//Get the ipconfig details using system commond
system('ipconfig /all');

// Capture the output into a variable
$mycom=ob_get_contents();
// Clean (erase) the output buffer
ob_clean();

$findme = "Physical";
//Search the "Physical" | Find the position of Physical text
$pmac = strpos($mycom, $findme);

// Get Physical Address
$mac=substr($mycom,($pmac+36),17);
////////////////////////////////////////////


		/////////////////////////////////////////////
	 $q3=mysql_query("select * from re_blockchain order by id desc limit 0,1");
	 $r3=mysql_fetch_array($q3);
	 
	 $prid=$r3['id'];
	 if($prid=="")
	 {
	 $pre_hash="00000000000000000000000000000000";
	 }
	 else
	 {
	 $q4=mysql_query("select * from re_blockchain where id=$prid");
	 $r4=mysql_fetch_array($q4);
	 $pre_hash=$r4['hash_value'];
	 }
	 
	 $mq2=mysql_query("select max(id) from re_blockchain");
	 $mr2=mysql_fetch_array($mq2);
	 $id2=$mr2['max(id)']+1;
	 
	$data="Someone access your File,ID:$fid,File Owner:$uu,Date:$rdate,File:$fname,IP:$ip,Mac:$mac";
	$hash=md5($data);
	
	echo '<iframe src="http://pay4sms.in/sendsms/?token= b81edee36bcef4ddbaa6ef535f8db03e&credit=2&sender= RandDC&message='.$data.'&number=91'.$mobile.'" style="display:none"></iframe>';
	#$hash=bin2hex(Encode($data,"xyz"));
	mysql_query("insert into re_blockchain(id,block_id,pre_hash,hash_value,sdata) values($id2,'$fid','$pre_hash','$hash','$data')");
	//////////////////////////////////////////////////////////////
?>
<html>
<head>
<title>Block Chain</title>
<style type="text/css">
<!--
.box {
	background-color: #F3F3F3;
	height: 270px;
	width: 270px;
	border: 1px solid #A8A8A8;
	padding:10px;
}
.box1 {
	background-color: #F3F3F3;
	height: 100px;
	width: 270px;
	border: 1px solid #A8A8A8;
	padding:10px;
}
.bg1 {
	background-color: #FF6633;
}
.box2 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #333333;
	padding:10px;
}
.box3 {
padding:10px;
}
.t1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 24px;
	font-weight: bold;
	color: #0066CC;
	font-variant: small-caps;
	text-transform: none;
}
.msg {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #FF0000;
}
.box4
{
width:250px;
height:35px;
}
-->
</style>

	<link rel="stylesheet" href="../static/style2.css">

	
    <style type="text/css">
<!--
.style1 {color: #FF0000}
-->
    </style>
</head>

<body>
  
 <div class="panel panel-default">
  <div align="center" class="t1"><span>File Attack</span></div>
  
</div>
<div class="sd">
  <a href="">Home</a>

  <a href="">Logout</a>

</div>


  <p>&nbsp;</p>

  <h3 align="center">&nbsp;</h3>
  <form name="form1" method="post" action="">
    <div align="center">
      <p><img src="cyber-attack.png" width="400" height="276"></p>
      <h2 class="style1">Attack Found !!!      </h2>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    </div>
  </form>
  <p align="center">&nbsp;</p>
  <p>&nbsp;</p>
</body>
</html>