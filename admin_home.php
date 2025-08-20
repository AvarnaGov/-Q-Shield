<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);

$q1=mysql_query("select * from blockchain");
	 $n1=mysql_num_rows($q1);
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

	<link rel="stylesheet" href="style2.css">

	
</head>

<body>
  
 <div class="panel panel-default">
  <div align="center" class="t1"><span>Block Chain</span></div>
  
</div>
<div class="sd">
  <a href="admin_home.php">Home</a>

  <a href="logout.php">Logout</a>

</div>


  <p>&nbsp;</p>

  <h3 align="center">Block Chain</h3>
  
 <?php
 if($n1>0)
 {
 while($r1=mysql_fetch_array($q1))
 {
 ?>
   <table width="90%" border="1" align="center">
     <tr>
       <td width="15%" class="card-primary">Block ID </td>
       <td width="85%" class="card-primary"><?php echo $r1['id']; ?></td>
     </tr>
     <tr>
       <td>Previous Hash </td>
       <td>
	   <?php
	   if($r1['pre_hash']=="")
	   {
	   echo "00000000000000000000000000000000";
	   }
	   else
	   {
	   echo $r1['pre_hash'];
	   }
	   ?>
	   
	   </td>
     </tr>
     <tr>
       <td>Hash</td>
       <td><?php echo $r1['hash_value']; ?></td>
     </tr>
     <tr>
       <td>Data</td>
       <td><?php echo $r1['sdata']; ?></td>
     </tr>
   </table>
   <?php
   }
   
   }
   ?>
   <p>&nbsp;</p>
</body>
</html>