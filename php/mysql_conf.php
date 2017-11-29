<?php
header("Content-type: text/html; charset=utf-8");
$mysql_server_name="localhost";
$mysql_username="root";
$mysql_password="4344454gg";
$mysql_database="blog";

$conn=mysqli_connect($mysql_server_name,$mysql_username,$mysql_password,$mysql_database);
if (!$conn) {
	echo "mysql connect error" . mysqli_error($conn);
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
function getIpaddr()
{
  $ip=false;
  if(!empty($_SERVER["HTTP_CLIENT_IP"])){
   $ip = $_SERVER["HTTP_CLIENT_IP"];
  }
  if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
   $ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
   if ($ip) { array_unshift($ips, $ip); $ip = FALSE; }
   for ($i = 0; $i < count($ips); $i++) {
    if (!eregi ("^(10│172.16│192.168).", $ips[$i])) {
     $ip = $ips[$i];
     break;
    }
   }
  }
  return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
}

function getBrowser(){
  if(empty($_SERVER['HTTP_USER_AGENT'])){
  return 'Unknown';
 }
 if( (false == strpos($_SERVER['HTTP_USER_AGENT'],'MSIE')) && (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident')!==FALSE) ){
  return 'Internet Explorer 11.0';
 }
 if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 10.0')){
  return 'Internet Explorer 10.0';
 }
 if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 9.0')){
  return 'Internet Explorer 9.0';
 }
 if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 8.0')){
  return 'Internet Explorer 8.0';
 }
 if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 7.0')){
  return 'Internet Explorer 7.0';
 }
 if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 6.0')){
  return 'Internet Explorer 6.0';
 }
 if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'Edge')){
  return 'Edge';
 }
 if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'Firefox')){
  return 'Firefox';
 }
 if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'Chrome')){
  return 'Chrome';
 }
 if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'Safari')){
  return 'Safari';
 }
 if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'Opera')){
  return 'Opera';
 }
 if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'360SE')){
  return '360SE';
 }
  //微信浏览器
 if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'MicroMessage')){
  return 'MicroMessage';
 }
 }
function getOS(){
 $os='';
 $Agent=$_SERVER['HTTP_USER_AGENT'];
 if (eregi('win',$Agent)&&strpos($Agent, '95')){
  $os='Windows 95';
 }elseif(eregi('win 9x',$Agent)&&strpos($Agent, '4.90')){
  $os='Windows ME';
 }elseif(eregi('win',$Agent)&&ereg('98',$Agent)){
  $os='Windows 98';
 }elseif(eregi('win',$Agent)&&eregi('nt 5.0',$Agent)){
  $os='Windows 2000';
 }elseif(eregi('win',$Agent)&&eregi('nt 6.0',$Agent)){
  $os='Windows Vista';
 }elseif(eregi('win',$Agent)&&eregi('nt 6.1',$Agent)){
  $os='Windows 7';
 }elseif(eregi('win',$Agent)&&eregi('nt 5.1',$Agent)){
  $os='Windows XP';
 }elseif(eregi('win',$Agent)&&eregi('nt',$Agent)){
  $os='Windows NT';
 }elseif(eregi('win',$Agent)&&ereg('32',$Agent)){
  $os='Windows 32';
 }elseif(eregi('linux',$Agent)){
  $os='Linux';
 }elseif(eregi('unix',$Agent)){
  $os='Unix';
 }else if(eregi('sun',$Agent)&&eregi('os',$Agent)){
  $os='SunOS';
 }elseif(eregi('ibm',$Agent)&&eregi('os',$Agent)){
  $os='IBM OS/2';
 }elseif(eregi('Mac',$Agent)&&eregi('PC',$Agent)){
  $os='Macintosh';
 }elseif(eregi('PowerPC',$Agent)){
  $os='PowerPC';
 }elseif(eregi('AIX',$Agent)){
  $os='AIX';
 }elseif(eregi('HPUX',$Agent)){
  $os='HPUX';
 }elseif(eregi('NetBSD',$Agent)){
  $os='NetBSD';
 }elseif(eregi('BSD',$Agent)){
  $os='BSD';
 }elseif(ereg('OSF1',$Agent)){
  $os='OSF1';
 }elseif(ereg('IRIX',$Agent)){
  $os='IRIX';
 }elseif(eregi('FreeBSD',$Agent)){
  $os='FreeBSD';
 }elseif(eregi('Windows Phone',$Agent)){
  $os='Windows Phone';
 }elseif(eregi('Android',$Agent)){
  $os='Android';
 }elseif(eregi('iPhone',$Agent)){
  $os='iPhone';
 }elseif(eregi('iPad',$Agent)){
  $os='iPad';
 }elseif($os==''){
  $os='Unknown';
 }
 return $os;
}

function insertContent($x,$username,$email,$content,$ipaddr,$browser,$os)
{
    if (!$username) return -1;
    if (!$content) return -2;
    $ret=mysqli_query($x,"insert into guestboard(username,email,content,content_date,ipaddr,browser,os)values('$username','$email','$content',sysdate(),'$ipaddr','$browser','$os')");
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
    $res = mysqli_query($x,'select id,username,content,content_date,profile,up from guestboard');
    while($row=mysqli_fetch_array($res)){
        if ($row['username'] == "921543103") {
            $head="<p><img width='30px' height='30px' src='../src/img/guest/admin.png'/><b style='color:red;'>管理员";
        } else {
            $head="<p><img width='30px' height='30px' src='" . $row['profile'] . "'/>游客 <b>" . $row['username'];
        }
        echo $head . "</b> 留言说：</p>";
        echo "<p id='" . $row['id'] . "'>" . $row['content'] . "</p>";
        echo "<a onclick='setCookie();' href='up.php?id=" . $row['id'] . "'><img src='../src/img/up.png' width='15px' height='15px'/></a><span style='color:gray;'>("  . $row['up'] . ")&nbsp;&nbsp;&nbsp;&nbsp;" . $row['content_date'] . "</span>";
        echo "<hr>";
    }
    mysqli_close($x);
}
?>
