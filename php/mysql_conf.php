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
mysqli_query($conn, "set names utf8");
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
    if (!preg_match("^(10│172.16│192.168).", $ips[$i])) {
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
 if (preg_match('/.+win.+/i',$Agent)&&strpos($Agent, '95')){
  $os='Windows 95';
 }elseif(preg_match('/.+win.+/i',$Agent)&&preg_match('98',$Agent)){
  $os='Windows 98';
 }elseif(preg_match('/.+win.+/i',$Agent)&&preg_match('/.+nt 5.0.+/i',$Agent)){
  $os='Windows 2000';
 }elseif(preg_match('/.+win.+/i',$Agent)&&preg_match('/.+nt 6.0.+/i',$Agent)){
  $os='Windows Vista';
 }elseif(preg_match('/.+win.+/i',$Agent)&&preg_match('/.+nt 6.1.+/i',$Agent)){
  $os='Windows 7';
 }elseif(preg_match('/.+win.+/i',$Agent)&&preg_match('/.+nt 5.1.+/i',$Agent)){
  $os='Windows XP';
 }elseif(preg_match('/.+win.+/i',$Agent)&&preg_match('/.+nt.+/i',$Agent)){
  $os='Windows NT';
 }elseif(preg_match('/.+win.+/i',$Agent)&&preg_match('32',$Agent)){
  $os='Windows 32';
 }elseif(preg_match('/.+linux.+/i',$Agent)){
  $os='Linux';
 }elseif(preg_match('/.+unix.+/i',$Agent)){
  $os='Unix';
 }else if(preg_match('/.+sun.+/i',$Agent)&&preg_match('/.+os.+/',$Agent)){
  $os='SunOS';
 }elseif(preg_match('/.+ibm.+/i',$Agent)&&preg_match('/.+os.+/',$Agent)){
  $os='IBM OS/2';
 }elseif(preg_match('/.+Mac.+/i',$Agent)&&preg_match('/.+PC.+/',$Agent)){
  $os='Macintosh';
 }elseif(preg_match('/.+PowerPC.+/i',$Agent)){
  $os='PowerPC';
 }elseif(preg_match('/.+AIX.+/i',$Agent)){
  $os='AIX';
 }elseif(preg_match('/.+HPUX.+/i',$Agent)){
  $os='HPUX';
 }elseif(preg_match('/.+NetBSD.+/i',$Agent)){
  $os='NetBSD';
 }elseif(preg_match('/.+BSD.+/i',$Agent)){
  $os='BSD';
 }elseif(preg_match('/.+OSF1.+/i',$Agent)){
  $os='OSF1';
 }elseif(preg_match('/.+IRIX.+/i',$Agent)){
  $os='IRIX';
 }elseif(preg_match('/.+FreeBSD.+/i',$Agent)){
  $os='FreeBSD';
 }elseif(preg_match('/.+Windows Phone.+/i',$Agent)){
  $os='Windows Phone';
 }elseif(preg_match('/.+Android.+/i',$Agent)){
  $os='Android';
 }elseif(preg_match('/.+iPhone.+/i',$Agent)){
  $os='iPhone';
 }elseif(preg_match('/.+iPad.+/i',$Agent)){
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
