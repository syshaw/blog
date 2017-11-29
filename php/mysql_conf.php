<?php
$mysql_server_name="localhost";
$mysql_username="root"; 
$mysql_password="4344454gg";
$mysql_database="blog";

$conn=mysqli_connect($mysql_server_name,$mysql_username,$mysql_password,$mysql_database);
if (!$conn) {
	echo "hh??";
	echo "mysql connect error" . mysqli_error();
	die();
}
function getViews($x){
	mysqli_query($x, 'update views set count=count+1');
	$res = mysqli_query($x ,'select count from views');
	if ($row = mysqli_fetch_array($res)) {
		mysqli_close($x);
		return $row['count'];
	}
}
function insertContent($x,$username,$email,$content,$ipaddr)
{
    if (!$username) return -1;
    if (!$content) return -2;
    $ret=mysqli_query($x,"insert into guestboard(username,email,content,content_date,ipaddr)values('$username','$email','$content',sysdate(),'$ipaddr')");
    if (!$ret) return -3;
	return 0;
}
function getContentCount($x){
	$res = mysqli_query($x,'select count(*) from guestboard');
	if ($row = mysqli_fetch_array($res)) {
		return $row['count(*)'];
	}
}
function printContent($x)
{
    $res = mysqli_query($x,'select username,content,content_date from guestboard');
    while($row=mysqli_fetch_array($res)){
        echo "<p>游客 <b>" . $row['username'] . "</b> 留言说：(" . $row['content_date'] . ")</p>";
        echo "<p>" . $row['content'] . "</p>";
        echo "<hr>";
    }
    mysqli_close($x);
}
?>
