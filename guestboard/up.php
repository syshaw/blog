<?php
require("../php/mysql_conf.php");
if (!is_numeric($_GET["id"])) {
    echo "<script>window.location='/';</script>";
}
$sql = "update guestboard set up=up+1 where id=" . $_GET["id"];
mysqli_query($conn,$sql);
mysqli_close($conn);
echo "<script>window.location='../guestboard/#" . $_GET["id"] . "';</script>";
?>
