<?php
session_start();
include("include/dbconnect.php");
extract($_POST);
$msg="";
if($_REQUEST['act']=="ok")
	{
	$uid=$_REQUEST['id'];
	mysql_query("update ks_user_reg set status='1' where id='$uid'");
	header("location:home_cp.php");
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
</head>
<body>
<div class="main">

  <div class="header">
    <div class="header_resize">
      <div class="menu_nav">
        <ul>
          <li class="active"><a href="home_cp.php">Home</a></li>
		   <li><a href="tracing.php">Users</a></li>
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
      <h2>Cloud Owner Details </h2>
      <table width="808" border="1" cellspacing="0" cellpadding="0">
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
		 $qs=mysql_query("select * from ks_user_reg order by id desc");
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
          <td class="bg4"><?php echo $rs['username']; ?></td>
          <td class="bg4"><?php echo $rs['rdate']; ?></td>
          <td class="bg4"><?php
			if($rs['status']=="1")
			{
			echo "Approved";
			}
			else
			{
			?>
              <a href="home_cp.php?act=ok&id=<?php echo $rs['id']; ?>">Click to Approval</a>
              <?php
			}
			
			?></td>
        </tr>
        <?php
		  }
		  ?>
      </table>
      <p>&nbsp;</p>
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
        <li class="active"><a href="logout.php">Logout</a></li>
      </ul>
      <div class="clr"></div>
    </div>
  </div>
</div>
</body>
</html>
