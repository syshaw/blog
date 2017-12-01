<?php
require("../php/mysql_conf.php");
$ret=insertContent($conn,$_POST["username"],$_POST["email"],$_POST["content"],getIpaddr(),getBrowser(),getOs());
if ($ret) {
	echo "error code:" . $ret;
	if ($ret == -3)
	echo "<br>失败咯，" . mysqli_error($conn);
}
mysqli_close($conn);
?>

