<?php
require("../php/mysql_conf.php");
?>
<!DOCTYPE html>
<html>
    <head>

        <link rel="icon" href="../src/img/ioc.jpg" type="image/x-icon"/>
         <link rel="stylesheet" href="../src/css/guestboard.css">
         <script src="../src/js/jquery.js"></script>
        <title>Guestboard(留言板)</title>
    </head>
    <body >
        <h1>Welcome to 留言板(beta 1.1)<br>
            <iframe src="http://music.163.com/outchain/player?type=2&amp;id=471942&amp;auto=1&amp;height=66" width="250px" height="86" frameborder="no" marginwidth="0" marginheight="100"></iframe>
            <hr>
        </h1>
        <table>
            <tr>
                <td>
                    <h4>有什么想对我说的就大胆的说出来吧๑乛◡乛๑! </h4>
                    <h4>包括但不限于对我的不满情绪、意见及建议. </h4>
                    <h4>以及你想表达的任何想法.(︶︹︺)不过不要发有关政治敏感的话题呢</h4>
                    <h6>欢迎留言。。。耶\(≧▽≦)/</h6>
                    <p style='color:gray;'><?php echo "你的IP:" . getIpaddr(); ?><br><?php echo "浏览器:" . getBrowser(); ?><br><?php echo "操作系统:" . getOs(); ?></p>
                </td>
        <td><img src="../src/img/nxn.gif" width="500px" height="200px"></td>
        </table>
        <div onclick="goto_top();" class="gototop"><img src="../src/img/top.jpeg" width="50px" height="50px"/></div>
         <hr>
        <?php printContent($conn);?>
	<div id="div_input" class="basic-grey">
		<h1>\(≧▽≦)/当前留言总数：<?php echo getContentCount($conn);?></h1>
		<label>
			<span>名字(必填) :</span>
			<input id="username_id" type="text" name="username" placeholder="留言使用的名字" />
		</label>
		<label>
			<span>邮箱(可选) :</span>
			<input id="email_id" type="email" name="email" placeholder="你的邮箱" />
		</label>
		<label>
			<span>内容(必填) :</span>
			<textarea id="content_id" name="content" placeholder="( ＾∀＾）／吐槽开始＼( ＾∀＾）"></textarea>
		</label>
		<label>
			<span>&nbsp;</span>
			<input onclick="checkContent();" type="button" class="button" value="发布" />
		</label>
	</div>
	<div id="div_mtwnd" class="mtwnd">
		<div id="div_reply" class="basic-grey">
		<label>
			<span>名字(必填) :</span>
			<input id="username_id" type="text" name="username" placeholder="留言使用的名字" />
		</label>
		<label>
			<span>邮箱(可选) :</span>
			<input id="email_id" type="email" name="email" placeholder="你的邮箱" />
		</label>
		<label>
			<span>内容(必填) :</span>
			<textarea id="content_id" name="content" placeholder="( ＾∀＾）／吐槽开始＼( ＾∀＾）"></textarea>
		</label>
		<label>
			<span>&nbsp;</span>
			<input onclick="checkContent();" type="button" class="button" value="发布" />
		</label>
		</div>
	</div>
<footer>
    <p>©2017 <a href="http://syshaw.tk">Syshaw's Blog</a></p>
    <p>All Rights Reserved;</p>
</footer>
<script type="text/javascript">
	function goto_top(){
		$("html").animate({scrollTop:'0px'},"slow");
	}
    function checkContent(){
    	var scrollTop=Math.max(document.documentElement.scrollTop,document.body.scrollTop);
        var usrnm = document.getElementById('username_id').value;
        var email = document.getElementById('email_id').value;
        var cnt = document.getElementById('content_id').value;
        var form = document.getElementById("content_form");
        if (!usrnm){
            alert("喵喵喵？名字呢？");
            return;
        }
        if (!cnt) {
            alert("大兄弟，你还没写留言内容呢(O.O)");
            return;
        }
        $.post("guestboard.php",{username:usrnm,email:email,content:cnt,scrollTop:scrollTop},function reload(){window.location.reload();});
    }
    function setCookie($x){
		var curvalue=document.getElementById('up_'+$x);
		curvalue.innerHTML=parseInt(curvalue.innerHTML)+1;
		$.get("up.php?id="+$x);
    }
	function reply($x){
		var val = document.getElementById('div_mtwnd').style.display;
		if (val == "none") {
			document.getElementById('div_mtwnd').style.display = "block";
		} else {
			document.getElementById('div_mtwnd').style.display = "none";
		}
	}
</script>
    </body>
</html>

