<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);

if(isset($btn))
{
$qry=mysql_query("select * from ks_register where uname='$uname' && signature='$pass'");
	   $num=mysql_num_rows($qry);
			if($num==1)
				{
					$_SESSION['uname']=$uname;
			  header("location:verify.php"); 
				}
				
				else
				{
				$msg="Invalid User!";
				}
			}
?>
<html>
<head>
<title>Block Chain</title>
	<link rel="stylesheet" href="style2.css">
</head>

<body>
<div class="panel panel-default">
  <div align="center" class="t1"><span>Block Chain</span></div>
  
</div>
<div class="login">
			<h1>User</h1>
			
			<form id="form1" name="form1" method="post" action="">
				<label for="username">
					<i class="fas fa-user">U</i>
				</label>
				<input type="text" name="uname" placeholder="Username" required>
				<label for="password">
					<i class="fas fa-lock">P</i>
				</label>
				<input type="password" name="pass" placeholder="Private Key" required>
				<div class="msg"><?php echo $msg; ?></div>
				<input type="submit" name="btn" value="Login">
			</form>
</div>
<p align="center"><a href="index.php">Home</a> | <p align="center"><a href="user_block.php">User Verification</a></p>
<!--end content area-->
  
  <p>&nbsp;</p>
</body>
</html>