<?php
session_start();
include("include/dbconnect.php");
include("decrypt.php");
extract($_POST);
$msg="";
$uname=$_SESSION['uname'];
$uid=$_REQUEST['uid'];
$fid=$_REQUEST['fid'];
if(isset($btn))
	{
	$skey=$_REQUEST['skey'];
	 $qs2=mysql_query("select * from ks_request where id='$uid'");
	 $rs2=mysql_fetch_array($qs2);
	 $skey2=$rs2['secret_key'];
	 $unn=$rs2['uname'];
	 $qs3=mysql_query("select * from ks_user_files where id='$fid'");
	 $rs3=mysql_fetch_array($qs3);
	 
	 
	 if($unn==$uname)
	 {
	 
			if($skey==$skey2)
			{
			$fname=$rs3['upload_file'];
			$un=$rs2['owner'];
		 $q1=mysql_query("select * from ks_register where uname='$un'");
			$r1=mysql_fetch_array($q1);
			$pbk=$r1['public_key'];
			$crypt = "../trace_owner/upload/$fname";
						copy("../trace_owner/upload/$fname","../key_owner/cloud/$fname");
						$decrypt = "../trace_owner/cloud/$fname";
	
						DecryptFile($crypt,$decrypt,$pbk);
		header("location:../trace_owner/download2.php?file1=".$rs3['upload_file']."&folder1=cloud");
			}
			else
			{
			$msg="Invalid Secret Key!";
			}
		}
		else
		{
		$ip=$_SERVER['REMOTE_ADDR'];
			
			$q1=mysql_query("select * from ks_blocked where ipaddress='$ip'");
			$n1=mysql_num_rows($q1);
			
			if($n1==0)
			{
			
				$max_qry22 = mysql_query("select max(id) maxid from ks_blocked");
				$max_row22 = mysql_fetch_array($max_qry22);
				$id22=$max_row22['maxid']+1;
				mysql_query("insert into ks_blocked(id,ipaddress,hack_pattern) values($id22,'$ip','Using Secret Key')");
				?>
				<script language="javascript">
				alert("Access Denied! You have unauthorized to access File!");
				</script>
				<?php
			}
			else
			{
			?>
				<script language="javascript">
				alert("Your Access has Blocked!!");
				</script>
				<?php
			}
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
  	if(document.form1.skey.value=="")
	{
	alert("Enter the Secret Key");
	document.form1.skey.focus();
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
      <form name="form2" method="post" action="">
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
    <div class="right_side">
      <div class="nav"></div>
    </div>
    <div class="left_side">
      <h2><a href="#">Key Verification </a></h2>
      <form id="form1" name="form1" method="post" action="">
        <table width="451" border="0" align="center">
          <tr>
            <td>Enter the Secret Key </td>
            <td><input type="password" name="skey" /></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input type="submit" name="btn" value="Download" onclick="return validate()" /></td>
          </tr>
          <tr>
            <td colspan="2" align="center" class="msg"><?php
			if($msg!="")
			{
			echo $msg;
			}
			?></td>
          </tr>
        </table>
        <p align="center">&nbsp;</p>
        <p align="center"></p>
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
<div align=center>Cloud User </div>
</body>
</html>
