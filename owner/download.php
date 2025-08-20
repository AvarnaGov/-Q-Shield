<?php
session_start();
include("include/dbconnect.php");
extract($_REQUEST);
$uname=$_SESSION['uname'];


$qry2=mysql_query("select * from ks_user_files where upload_file='$file1'");
$row2=mysql_fetch_array($qry2);
$fid=$row2['id'];
$unn=$row2['uname'];

$qry=mysql_query("select * from ks_register where owner='$uname' && uname='$unn'");
$row=mysql_fetch_array($qry);
$num=@mysql_num_rows($qry);


$qry3=mysql_query("select * from ks_register where uname='$unn'");
$row3=mysql_fetch_array($qry3);
$owner=$row3['owner'];


?>
<script language="javascript">
window.location.href="../user/download3.php?file1=<?php echo $file1; ?>&folder1=<?php echo $folder1; ?>";
</script>
