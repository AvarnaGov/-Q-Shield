<?php
session_start();
include("include/dbconnect.php");
extract($_POST);
$msg="";

if(isset($btn))
{
	
		$qry=mysql_query("select * from ks_user_reg where username='".$uname."' && password='".$pass."' && status=1");
		$num=mysql_num_rows($qry);
			if($num==1)
			{
			$_SESSION['uname']=$uname;
				$qq=mysql_query("select * from ks_register where owner='$uname'");
				while($rr=mysql_fetch_array($qq))
				{
				$uuu=$rr['uname'];
				
			
				}
				mysql_query("update ks_user_files set file_req=0 where owner='$uname'");
			header("location:userhome.php");
			}
			else
			{
			$msg="Invalid User! or You are not get permission!";
			}
		
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Cloud</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css" media="all">
@import "images/style.css";
</style>
 <script language="javascript">
  function validate()
  {
  	if(document.form1.uname.value=="")
	{
	alert("Enter the Username");
	document.form1.uname.focus();
	return false;
	}
	if(document.form1.pass.value=="")
	{
	alert("Enter the Password");
	document.form1.pass.focus();
	return false;
	}

return true;
  }
  </script>
</head>
<body>

<div class="content">
  <div id="top">
    <div class="padding"> <a href="#">About me</a> | <a href="#">contact</a> </div>
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
        <li><a href="index.php">Home</a></li>
        <li><a href="user_reg.php">Register</a></li>
      </ul>
    </div>
  </div>
  <div id="main">
    <div class="right_side">
      <div class="nav">
        <p><img src="images/Cloud-User.jpg" width="189" height="158" /></p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
      </div>
    </div>
    <div class="left_side">
      <h2><a href="#">Login</a></h2>
      <form id="form1" name="form1" method="post" action="">
        <table width="361" border="0" align="center" cellpadding="5" cellspacing="0">
          <tr>
            <td colspan="2" class="red"><?php
			  if($msg!="")
			  {
			  echo $msg;
			  }
			  ?></td>
          </tr>
          <tr>
            <td width="141" align="left">Username</td>
            <td width="200" align="left"><input type="text" name="uname" /></td>
          </tr>
          <tr>
            <td align="left">Password</td>
            <td align="left"><input type="password" name="pass" /></td>
          </tr>

          <tr>
            <td colspan="2" align="center">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input type="submit" name="btn" value="Login" onclick="return validate()" /></td>
          </tr>
          <tr>
            <td colspan="2" align="center">&nbsp;</td>
          </tr>
        </table>
      </form>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    </div>
  </div>
  <div id="footer">
    <div class="padding"></div>
  </div>
</div>
<div align=center>Cloud </div>
</body>
</html>
