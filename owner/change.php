<?php
session_start();
include("include/dbconnect.php");
extract($_POST);
$msg="";
$uname=$_SESSION['uname'];
$qs2=mysql_query("select * from ks_user_reg where username='$uname'");
$rs2=mysql_fetch_array($qs2);
$auser=$rs2['owner'];
if(isset($btn))
	{
$skey=rand(1000,9999);
$skey2 = md5($skey);
$pbkey=substr($skey2,0,8);
	
	
	$au=$_REQUEST['au'];
	mysql_query("update ks_register set public_key='$pbkey' where uname='$auser'");
	mysql_query("update ks_user_reg set owner='$au',status='0' where username='$uname'");
	
	
	$qs4=mysql_query("select * from ks_user_reg where owner='$auser' && username!='$uname'");
	while($rs4=mysql_fetch_array($qs4))
	{
	$email=$rs4['email'];
	//new javapack.Mail().SendMail(email, "New Public Key", "Key: "+pbkey,"");
	
	}
	
	?>
	<script language="javascript">
	alert("Changed Successfully, Re-Login your account");
	window.location.href="logout.php";
	</script>
	<?php
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
      <form method="post" action="">
        <p>&nbsp;</p>
      </form>
    </div>
    <div class="title">
      <h1>Cloud User </h1>
      <h2></h2>
    </div>
  </div>
  <div id="subheader">
    <div id="menu">
      <ul>
        <li><a href="userhome.php">Home</a></li>
        <li><a href="req_files.php">Required</a></li>
      </ul>
    </div>
  </div>
  <div id="main">
    <div class="left_side">
      <h2><a href="#">Change Auhority </a></h2>
      <form id="form1" name="form1" method="post" action="">
        <table width="297" height="78" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <th width="57" scope="col">Select</th>
            <th width="240" scope="col">AttributeAuthority</th>
          </tr>
          <?php
			$qs3=mysql_query("select * from ks_register where uname!='$auser'");
			while($rs3=mysql_fetch_array($qs3))
			{
			?>
          <tr>
            <td><input name="au" type="radio" value="<?php echo $rs3['uname']; ?>" /></td>
            <td><?php echo $rs3['uname']; ?></td>
          </tr>
          <?php
			}
			?>
        </table>
        <p align="center">
          <input type="submit" name="btn" value="Submit" />
        </p>
        <p align="center">&nbsp;</p>
        <p align="center">&nbsp;</p>
        <p align="center">&nbsp;</p>
      </form>
      <p>&nbsp;</p>
    </div>
  </div>
  <div id="footer">
    <div class="padding"></div>
  </div>
</div>
<div align=center>Cloud User </div>
</body>
</html>
