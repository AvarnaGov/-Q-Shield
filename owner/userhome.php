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
    <h2>User Details </h2>
      
      <form id="form1" name="form1" method="post" action="">
        
        <table width="100%" border="1" cellspacing="0" cellpadding="0">
          <tr>
            <th width="51" class="bg3">Sno</th>
            <th width="175" class="bg3">Name</th>
            <th width="86" class="bg3">E-mail</th>
            <th width="105" class="bg3">Contact No </th>
            <th width="130" class="bg3">Username</th>
            <th width="103" class="bg3">Date</th>
            <th width="142" class="bg3">Action</th>
          </tr>
          <?php
		 $qs=mysql_query("select * from ks_register where owner='$uname' order by id desc");
		  $i=0;
		  while($rs=mysql_fetch_array($qs))
		  { 
		  $i++; 
		  ?>
          <tr>
            <td class="bg4"><?php echo $i; ?></td>
            <td class="bg4"><?php echo $rs['name']; ?></td>
            <td class="bg4"><?php echo $rs['email']; ?></td>
            <td class="bg4"><?php echo $rs['contact']; ?></td>
            <td class="bg4"><?php echo $rs['uname']; ?></td>
            <td class="bg4"><?php echo $rs['rdate']; ?></td>
            <td class="bg4"><?php
			if($rs['status']=="1")
			{
			echo "Approved<br>";
			echo '<a href="viewfiles.php?user='.$rs['uname'].'">Files</a>';
			}
			else
			{
			?>
                <a href="userhome.php?act=ok&amp;id=<?php echo $rs['id']; ?>">Click to Approval</a>
                <?php
			}
			
			?></td>
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
  <div id="footer">
    <div class="padding"></div>
  </div>
</div>
<div align=center>Cloud Owner </div>
</body>
</html>
