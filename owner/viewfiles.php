<?php
session_start();
include("include/dbconnect.php");
include("encrypt_data.php");
extract($_REQUEST);
$msg="";
$uname=$_SESSION['uname'];
$oq=mysql_query("select * from ks_user_reg where username='$uname'");
$or=mysql_fetch_array($oq);
$req=$or['file_req'];

$rdate=date("d-m-Y");
if($_REQUEST['act']=="ok")
	{
	$uid=$_REQUEST['id'];
	mysql_query("update ks_register set status='1' where id='$uid'");
	header("location:userhome.php");
	}
if($act=="req")
{
mysql_query("update ks_user_files set file_req='1',owner='$uname' where uname='$user' && id=$fid");
$q31=mysql_query("select * from ks_user_files where id=$fid");
$r31=mysql_fetch_array($q31);
$fname=$r31['upload_file'];
/////////////////////////////////////////////
	 $q3=mysql_query("select * from blockchain order by id desc limit 0,1");
	 $r3=mysql_fetch_array($q3);
	 
	 $prid=$r3['id'];
	 if($prid=="")
	 {
	 $pre_hash="00000000000000000000000000000000";
	 }
	 else
	 {
	 $q4=mysql_query("select * from blockchain where id=$prid");
	 $r4=mysql_fetch_array($q4);
	 $pre_hash=$r4['hash_value'];
	 }
	 
	 $mq2=mysql_query("select max(id) from blockchain");
	 $mr2=mysql_fetch_array($mq2);
	 $id2=$mr2['max(id)']+1;
	 
	$data="File ID:$fid,Request by $uname, Date:$rdate,File:$fname";
	$hash=md5($data);
	
	
	#$hash=bin2hex(Encode($data,"xyz"));
	mysql_query("insert into blockchain(id,block_id,pre_hash,hash_value,sdata) values($id2,'$fid','$pre_hash','$hash','$data')");
	//////////////////////////////////////////////////////////////
?>
<script language="javascript">
alert("Request has Sent..");
window.location.href="viewfiles.php?user=<?php echo $user; ?>";
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
      <form method="post" action="http://www.free-css-com/">
        <p>&nbsp;</p>
      </form>
    </div>
    <div class="title">
      <h1>Cloud Owner </h1>
      
    </div>
  </div>
  <div id="subheader">
    <div id="menu">
      <ul>
        <li><a href="userhome.php">Home</a></li>
		
        
      </ul>
    </div>
  </div>
  <div id="main">
    <div>
      <h2>Files</h2>
      
      <form id="form1" name="form1" method="post" action="">
        <table width="747" border="1" align="center" cellpadding="5" cellspacing="0">
          <tr>
            <th width="105" align="center" class="bg3">Sno</th>
            <th width="186" align="center" class="bg3">Content</th>
            <th width="176" align="center" class="bg3">Uploaded File</th>
            <th width="230" align="center" class="bg3">Date</th>
            <th width="230" align="center" class="bg3">Action</th>
          </tr>
          <?php
		  $qs=mysql_query("select * from ks_user_files where uname='$user'");
		  $i=0;
		  while($rs=mysql_fetch_array($qs))
		  { $i++;
		  ?>
          <tr>
            <td class="bg4"><?php echo $i; ?></td>
            <td class="bg4"><?php 
			if($rs['file_req']=="2")
			{
			echo TEA_Encode(TEA_Decode($rs['file_content']),"xyz"); 
			}
			else
			{
			echo $rs['file_content']; 
			}
			?></td>
            <td class="bg4"><?php 
			
			if($rs['file_req']=="2")
			{
			$ff=TEA_Encode(TEA_Decode($rs['upload_file']),"xyz");
			echo $ff;
			}
			else
			{
			echo $rs['upload_file'];
			}
			?></td>
            <td class="bg4"><?php echo $rs['modify_time']; ?></td>
            <td class="bg4">
			<?php
			if($rs['file_req']=="2")
			{
			$ff=TEA_Encode(TEA_Decode($rs['upload_file']),"xyz");
			echo '<a href="download.php?file1='.$ff.'&folder1=cloud">View</a>'; 
			}
			else if($rs['file_req']=="1")
			{
			echo "Request sent..";
			}
			else
			{
			echo '<a href="viewfiles.php?act=req&user='.$user.'&fid='.$rs['id'].'">Send Request</a>';
			}
			?></td>
          </tr>
          <?php
		  }
		  ?>
        </table>
        <p align="center">&nbsp;</p>
        <p align="center">
		
        </p>
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
<div align=center>Cloud User </div>
</body>
</html>
