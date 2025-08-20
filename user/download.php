<?php
session_start();
include("include/dbconnect.php");
extract($_REQUEST);
$uname=$_SESSION['uname'];
$qry=mysql_query("select * from ks_register where uname='$uname'");
$num=@mysql_num_rows($qry);

$qry2=mysql_query("select * from ks_user_files where upload_file='$file1'");
$row2=mysql_fetch_array($qry2);
$fid=$row2['id'];
$unn=$row2['uname'];
$qry3=mysql_query("select * from ks_register where uname='$unn'");
$row3=mysql_fetch_array($qry3);
$owner=$row3['owner'];
if($num>0)
{



$fname=$_REQUEST['file1'];
$directory=$_REQUEST['folder1'];
$file="$directory/$fname";
if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
    exit;
	}
	
}
else
{
$ip = $_SERVER['REMOTE_ADDR'];
//////MAC Address////////
ob_start();
//Get the ipconfig details using system commond
system('ipconfig /all');

// Capture the output into a variable
$mycom=ob_get_contents();
// Clean (erase) the output buffer
ob_clean();

$findme = "Physical";
//Search the "Physical" | Find the position of Physical text
$pmac = strpos($mycom, $findme);

// Get Physical Address
$mac=substr($mycom,($pmac+36),17);
////////////////////////////////////////////
			
			$q1=mysql_query("select * from ks_blocked where ipaddress='$ip'");
			$n1=mysql_num_rows($q1);
			
			//if($n1==0)
			//{
			
				$max_qry22 = mysql_query("select max(id) maxid from ks_blocked");
				$max_row22 = mysql_fetch_array($max_qry22);
				$id22=$max_row22['maxid']+1;
				//mysql_query("insert into ks_blocked(id,uname,owner,fid,ipaddress,macaddress,hack_pattern) values($id22,'$unn','$owner','$fid','$ip','$mac','URL Access')");
				?>
				<script language="javascript">
				//alert("Access Denied! You have unauthorized to download File!");
				</script>
				<?php
			//}
			//else
			//{
			?>
				<script language="javascript">
				//alert("URL has Blocked!!");
				</script>
				<?php
			//}
}	
?>