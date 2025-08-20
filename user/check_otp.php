<?php 
include("include/dbconnect.php"); 
extract($_REQUEST);
$rdate=date("d-m-Y");
$msg="";
$q1=mysql_query("select * from ks_register where id=$id");
$r1=mysql_fetch_array($q1);
$uname=$r1['uname'];
$sgk=$r1['signature'];
$pbkey=$r1['public_key'];
$key=$r1['otp'];
$email=$r1['email'];
if($r1['sms_st']=="0")
{
$mobile=$r1['contact'];
$message="OTP:".$r1['otp'];
mysql_query("update ks_register set sms_st=1 where id=$id");
echo '<iframe src="http://pay4sms.in/sendsms/?token= b81edee36bcef4ddbaa6ef535f8db03e&credit=2&sender= RandDC&message='.$message.'&number=91'.$mobile.'" style="display:none"></iframe>';
}
if(isset($btn))
{


		if($key==$otp)
		{
	require_once("email.php");	

						$objEmail	=	new CI_Email();
								$objEmail->from('cloud@gmail.com', "Key Information");
								$objEmail->to("$email");
							
								//$objEmail->cc($txt_cc);
								//$objEmail->bcc($txt_bcc);
								$objEmail->subject("Key Information");
								$objEmail->message("User:$uname, Public Key:$pbkey, Private Key: $sgk");
								//send mail
									
									if ($objEmail->send())
									{	
									//echo "sent";
									}
									else
									{	
									//echo "not";
									}
	?>
	<script language="javascript">
	alert("Registered Success... Key Generated and sent to your mail");
	window.location.href="index.php";
	</script>
	<?php
	}
	else
	{
	$msg="Could not regsiter!";
	}
}

?>
				
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php include("include/title.php"); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/arial.js"></script>
<script type="text/javascript" src="js/cuf_run.js"></script>
<!-- CuFon ends -->
 <script language="javascript">
function validate()
{
	if(document.form1.otp.value=="")
	{
	alert("Enter the OTP");
	document.form1.otp.focus();
	return false;
	}
	

return true;	
}
</script> 
</head>
<body>
<div class="main">

  <div class="header">
    <div class="header_resize">
      <div class="hleft">
        <div class="logo"><h1><a href="#"><span>Cloud </span>Data<br />
          <small></small></a></h1></div>
        <div class="clr"></div>
        <div class="searchform">
                <div class="clr"></div>
        </div>
        <div class="clr"></div>
        <p>Cloud computing is a model for enabling ubiquitous network access to a shared pool of configurable computing resources.</p>
      </div>
      <div class="hright">
        <div class="nav_menu">
          <ul>
            <li><a href="index.php">Home</a></li>
            <li class="active"><a href="register.php">Register</a></li>
          </ul>
        </div>
        <img src="images/siteAudit.jpg" width="234" height="191" /></div>
      <div class="clr"></div>
    </div>
  </div>

  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
        <div class="article">
          <h2>New User </h2>
          <form id="form1" name="form1" method="post" action="">
            <table width="337" border="0" align="center" cellpadding="5" cellspacing="0">
              <tr>
                <td colspan="2" align="center" class="txt1">Your OTP </td>
              </tr>
              <tr>
                <td align="left">Type here </td>
                <td align="left"><input type="text" name="otp" /></td>
              </tr>
              <tr>
                <td align="left">&nbsp;</td>
                <td align="left"><input type="submit" name="btn" value="Register" onClick="return validate()" /></td>
              </tr>
            </table>
          </form>
          <p>&nbsp;</p>
        </div>
        <div class="article">
          <h2>&nbsp;</h2>
        </div>
        </div>
      <div class="sidebar">
        <div class="gadget">
          <h2>Menu</h2>
          <ul class="sb_menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="register.php">Register</a></li>
          </ul>
        </div>
        <div class="gadget">
          <h2>&nbsp;</h2>
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
      <p class="lf">&copy; Keyword Search</p>
      <ul class="fmenu">
        <li><a href="index.php">Home</a></li>
        <li class="active"><a href="register.php">Register</a></li>
      </ul>
      <div class="clr"></div>
    </div>
  </div>
</div>
</body>
</html>
