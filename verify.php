<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);

?>
<html>
<head>
<title>Block Chain</title>
<style type="text/css">
<!--
.box {
	background-color: #F3F3F3;
	height: 270px;
	width: 270px;
	border: 1px solid #A8A8A8;
	padding:10px;
}
.box1 {
	background-color: #F3F3F3;
	height: 100px;
	width: 270px;
	border: 1px solid #A8A8A8;
	padding:10px;
}
.bg1 {
	background-color: #FF6633;
}
.box2 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #333333;
	padding:10px;
}
.box3 {
padding:10px;
}
.t1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 24px;
	font-weight: bold;
	color: #0066CC;
	font-variant: small-caps;
	text-transform: none;
}
.msg {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #FF0000;
}
.box4
{
width:250px;
height:35px;
}
-->
</style>

	<link rel="stylesheet" href="style2.css">

	
</head>

<body>
  
 <div class="panel panel-default">
  <div align="center" class="t1"><span>Block Chain</span></div>
  
</div>
<div class="sd">
  <a href="verify.php">Home</a>

  <a href="logout.php">Logout</a>

</div>


  <p>&nbsp;</p>

  <h3 align="center">Block Chain - Verification</h3>
  <form name="form1" method="post" action="">
    <div align="center">
      <table width="537" border="0" cellpadding="5" cellspacing="0">
        <tr>
          <td colspan="2" valign="top" class="bg1">Search Your File Details </td>
        </tr>
        <tr>
          <td width="218" valign="top"><img src="veri.jpg" width="196" height="190"></td>
          <td width="299" valign="top"><table width="259" height="120" border="0">
            <tr>
              <td colspan="2" align="left">&nbsp;</td>
            </tr>
            <tr>
              <td align="left">File ID</td>
              <td align="left"><input type="text" name="fid"></td>
            </tr>
            <tr>
              <td align="left">&nbsp;</td>
              <td align="left"><input type="submit" name="btn" value="Search"></td>
            </tr>
          </table></td>
        </tr>
      </table>
      <p>&nbsp;</p>
	  <?php
	  if(isset($btn))
	  {
	  $q11=mysql_query("select * from ks_user_files where id='$fid'");
	  $n11=mysql_num_rows($q11);
	  if($n11>0)
	  {
	  $qry=mysql_query("select * from blockchain where block_id='$fid'");
	  
	  ?>
      <table width="90%" border="1" align="center">
        <tr>
          <td width="5%" class="bg1">Sno</td>
          <td width="95%" class="bg1">File Details </td>
        </tr>
		<?php
		$i=0;
		while($row=mysql_fetch_array($qry))
		{
		$i++;
		?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $row['sdata']; ?></td>
        </tr>
		<?php
		}
		?>
      </table>
	  <?php
	  }
	  else
	  {
	  echo "Invalid File ID!";
	  }
	  }
	  ?>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    </div>
  </form>
  <p align="center">&nbsp;</p>
  <p>&nbsp;</p>
</body>
</html>