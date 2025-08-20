<?php
session_start();
include("include/dbconnect.php");
extract($_POST);
$msg="";
if($_REQUEST['act']=="ok")
	{
	$uid=$_REQUEST['id'];
	mysql_query("update ks_register set status='1' where id='$uid'");
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
          <li><a href="home_cp.php">Home</a></li>
		  <li class="active"><a href="view_index.php">Indexing</a></li>
		  <li><a href="view_key.php">Ranking</a></li>
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
      <h2>Indexing</h2>
      <table width="427" border="1" cellspacing="0" cellpadding="0">
        <tr>
          <th width="51" class="bg3">File ID </th>
          <th width="175" class="bg3">Data Owner</th>
          <th width="86" class="bg3">Filename</th>
          <th width="105" class="bg3">Keywords</th>
        </tr>
        <?php
		 $qs=mysql_query("select * from ks_user_files order by id");
		  $i=0;
		  while($rs=mysql_fetch_array($qs))
		  { 
		  $i++; 
		  ?>
        <tr>
          <td class="bg4"><?php echo $rs['id']; ?></td>
          <td class="bg4"><?php echo $rs['uname']; ?></td>
          <td class="bg4"><?php echo $rs['upload_file']; ?></td>
          <td class="bg4"><?php 
		  $qs2=mysql_query("select * from ks_user_search where fid='".$rs['id']."'");
		  while($rs2=mysql_fetch_array($qs2))
		  {
		  echo $rs2['keyword']."<br>";		  
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