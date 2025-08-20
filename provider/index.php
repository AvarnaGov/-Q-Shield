<?php
session_start();
include("include/dbconnect.php");
extract($_POST);
$msg="";

if(isset($btn))
{
	
		$qry=mysql_query("select * from admin where username='".$uname."' && password='".$pass."'");
		$num=mysql_num_rows($qry);
			if($num==1)
			{
			$_SESSION['uname']=$uname;
			header("location:home_cp.php");
			}
			else
			{
			$msg="Invalid User!";
			}
		
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Cloud Provider</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<!-- CuFon: Enables smooth pretty custom font rendering. 100% SEO friendly. To disable, remove this section -->
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/arial.js"></script>
<script type="text/javascript" src="js/cuf_run.js"></script>
<!-- CuFon ends -->
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
<form name="form1" method="post">
<div class="main">

  <div class="header">
    <div class="header_resize">
      <div class="menu_nav">
        <ul>
          <li class="active"><a href="index.php">Home</a></li>
        </ul>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
      <div class="logo">
        <h1><a href="">cloud Provider <br />
            <small>Services...</small></a></h1></div>
    </div>
  </div>

  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
        <div class="article">
          <h2><span>Login</span></h2>
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
          <p>&nbsp;</p>
        </div>
        <div class="article">
          <h2>&nbsp;</h2>
        </div>
      </div>
      <div class="sidebar">
        <div class="gadget">
          <h2 class="star"><img src="images/cloudserver.jpg" width="200" height="183" /></h2>
          </div>
        <div class="gadget">
          <h2 class="star">&nbsp;</h2>
        </div>
      </div>
      <div class="clr"></div>
    </div>
  </div>

  <div class="fbg">
    <div class="fbg_resize">
      <div class="clr"></div>
    </div>
  </div>
  <div class="footer">
    <div class="footer_resize">
      <p class="lf">&copy; Cloud Provider</p>
      <ul class="fmenu">
        <li class="active"><a href="index.php">Home</a></li>
		<li class="active"><a href="../trace_user/index.php">User</a></li>
      </ul>
      <div class="clr"></div>
    </div>
  </div>
</div>
</form>
</body>
</html>
