<?php
session_start();
include("include/dbconnect.php");
extract($_POST);
$msg="";
$uname=$_SESSION['uname'];
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
    <div class="right_side">
      <div class="nav"></div>
    </div>
    <div class="left_side">
      <h2><a href="#">Required Files </a></h2>
      <form id="form1" name="form1" method="post" action="">
        <p align="center">
          
</p>
        <table width="667" height="70" border="1" align="center" cellpadding="5" cellspacing="0">
          <tr>
            <th width="49" scope="col">Sno</th>
            <th width="169" scope="col">Owner</th>
            <th width="169" scope="col">Title</th>
            <th width="109" scope="col">File</th>
            <th width="109" scope="col">Action</th>
          </tr>
          <?php
				
				$i=0;
                                
				$qs=mysql_query("select * from ks_request where uname='$uname'");
				while($rs=mysql_fetch_array($qs))
				{ $i++;
				 $rid=$rs['fid'];
                                 
		  $qs3=mysql_query("select * from ks_user_files where id='$rid'");
		$rs3=mysql_fetch_array($qs3);
				?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $rs['owner']; ?></td>
            <td><?php echo $rs3['file_content']; ?></td>
            <td><?php echo $rs3['upload_file']; ?></td>
            <td><?php
				  if($rs['status']=="1")
				  {
				  ?>
                <a href="key_verify.php?uid=<?php echo $rs['id']; ?>&fid=<?php echo $rs['fid']; ?>">Download</a>
                <?php
				  }
				  else 
				  {
				  echo "wait for approval...";
				  }
				
				  ?>            </td>
          </tr>
          <?php
				}
				?>
        </table>
        
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
