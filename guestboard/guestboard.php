<?php
require("../php/mysql_conf.php");
$ret=insertContent($conn,$_POST["username"],$_POST["email"],$_POST["content"],"127.0.0.1");
if ($ret) {	
	echo "error code:" . $ret;
	if ($ret == -3)
	echo "<br>失败咯，未知error" . mysqli_error($conn);
}
mysqli_close($conn);
?>
<script>
    window.location="index.php";
</script>

