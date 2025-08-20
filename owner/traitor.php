<?php
session_start();
include("include/dbconnect.php");
extract($_POST);
$msg="";
$uname=$_SESSION['uname'];
$rdate=date("d-m-Y");
if($_REQUEST['act']=="ok")
	{
	$uid=$_REQUEST['id'];
	mysql_query("update ks_register set status='1' where id='$uid'");
	header("location:userhome.php");
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Cloud User</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css" media="all">
@import "images/style.css";
</style>
 <script language="javascript">
  function validate()
  {
  	if(document.form1.getval.value=="")
	{
	alert("Enter the Keyword");
	document.form1.getval.focus();
	return false;
	}


return true;
  }
  </script>
</head>
<body>
<div class="content">
  <div id="top">
    <div class="padding"> User: <?php echo $uname; ?> | <a href="logout.php">Logout</a> </div>
  </div>
  <div id="header">
    <div class="f_search">
      <form method="post" action="http://www.free-css-com/">
        <p>&nbsp;</p>
      </form>
    </div>
    <div class="title">
      <h1>Cloud Owner </h1>
      <h2></h2>
    </div>
  </div>
  <div id="subheader">
    <div id="menu">
      <ul>
        <li><a href="userhome.php">Home</a></li>
		<li><a href="traitor.php">Traitor</a></li>
        
      </ul>
    </div>
  </div>
  <div id="main">
    <div class="left_side"><h2>Traitors</h2>
     
      <form id="form1" name="form1" method="post" action="">
        
        <table width="578" border="1" cellspacing="0" cellpadding="0">
          <tr>
            <th width="51" class="bg3">Sno</th>
            <th width="123" class="bg3">IP Address </th>
            <th width="120" class="bg3">Mac Address </th>
            <th width="138" class="bg3">Hacked Pattern </th>
            <th width="134" class="bg3">Date / Time </th>
          </tr>
          <?php 
		$qs=mysql_query("select * from ks_blocked where owner='$uname'");
		  $i=0;
		  while($rs=mysql_fetch_array($qs))
		  { 
		  $i++; 
		  
		  ?>
          <tr>
            <td class="bg4"><?php echo $i; ?></td>
            <td class="bg4"><?php echo $rs['ipaddress']; ?></td>
            <td class="bg4"><?php echo $rs['macaddress']; ?></td>
            <td class="bg4"><?php echo $rs['hack_pattern']; 
			echo " (File user:".$rs['uname']."";
			if($rs['fid']!="")
			{
			echo ",FileID:".$rs['fid'];
			}
			echo ")";
			?></td>
            <td class="bg4"><?php echo $rs['dtime']; ?></td>
          </tr>
          <?php
		  }
		  ?>
        </table>
        <p align="center">&nbsp;</p>
      </form>
      <p>&nbsp;</p>
      <!--<p><a href="change.php">Change Authority </a></p>-->
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    </div>
  </div>
  <div id="footer">
    <div class="padding"></div>
  </div>
</div>
<div align=center>Cloud Owner </div>
</body>
</html>
