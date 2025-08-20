<?php
session_start();
include("include/dbconnect.php");
extract($_POST);
$msg="";
$rdate=date("d-m-Y");
if(isset($btn))
{
$mq=mysql_query("select max(id) from ks_user_reg");
$mr=mysql_fetch_array($mq);
$id=$mr['max(id)']+1;

$ins=mysql_query("insert into ks_user_reg(id,name,contact,email,username,password,status,rdate) values($id,'$name','$contact','$email','$uname','$pass','0','$rdate')");
					if($ins)
					{
					?>
					<script language="javascript">
					alert("Registered Successfully..");
					window.location.href="index.php";
					</script>
					<?php
					}
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
	if(document.form1.name.value=="")
	{
	alert("Enter the Name");
	document.form1.name.focus();
	return false;
	}
	if(document.form1.contact.value=="")
	{
	alert("Enter the Contatc No.");
	document.form1.contact.focus();
	return false;
	}
	if(document.form1.email.value=="")
	{
	alert("Enter the E-mail");
	document.form1.email.focus();
	return false;
	}
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
	if(document.form1.pass.value!=document.form1.cpass.value)
	{
	alert("Both password are not equals!");
	document.form1.cpass.select();
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
        <h2>Past Articles</h2>
        <ul>
          <li><a href="#">New template: Internet Music</a></li>
          <li><a href="#">CSS Heaven Gallery</a></li>
          <li><a href="#">CSS Toplist</a></li>
          <li><a href="#">Open Source Web Designs and Webmaster Forum</a></li>
          <li><a href="#">Welcome to iollo's review highway</a></li>
        </ul>
       
      </div>
    </div>
    <div class="left_side">
      <h2><a href="#">New User </a></h2>
      <form id="form1" name="form1" method="post" action="">
        <table width="420" height="271" border="0" align="center" cellpadding="5" cellspacing="0" class="bg2">
          <tr>
            <td align="left">Name</td>
            <td align="left"><input type="text" name="name" /></td>
          </tr>
          <tr>
            <td align="left">Contact No. </td>
            <td align="left"><input type="text" name="contact" /></td>
          </tr>
          <tr>
            <td align="left">E-mail</td>
            <td align="left"><input type="text" name="email" /></td>
          </tr>
          <tr>
            <td align="left">Username</td>
            <td align="left"><input type="text" name="uname" /></td>
          </tr>
          <tr>
            <td align="left">Password</td>
            <td align="left"><input type="password" name="pass" /></td>
          </tr>
          <tr>
            <td align="left">Confirm Password </td>
            <td align="left"><input type="password" name="cpass" /></td>
          </tr>
          <tr>
            <td align="left">&nbsp;</td>
            <td align="left"><input type="submit" name="btn" value="Register" onClick="return validate()" /></td>
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
<div align=center>Cloud Owner </div>
</body>
</html>