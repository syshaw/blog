<?php
require("../php/mysql_conf.php");
?>
<!DOCTYPE html>
<html>
    <head>

        <link rel="icon" href="../src/img/ioc.jpg" type="image/x-icon"/>
         <link rel="stylesheet" href="../src/css/guestboard.css">
        <title>Guestboard(留言板)</title>
    </head>
    <body >
        <h1>Welcome to 留言板(beta 1.0)<br>
            <iframe src="http://music.163.com/outchain/player?type=2&amp;id=471942&amp;auto=1&amp;height=66" width="250px" height="86" frameborder="no" marginwidth="0" marginheight="100"></iframe>
            <hr>
        </h1>
        <table>
            <tr>
                <td>
                    <h4>有什么想对我说的就大胆的说出来吧\(≧▽≦)/! </h4>
                    <h4>包括但不限于对我的不满情绪、意见及建议. </h4>
                    <h4>以及你想表达的任何想法.(︶︹︺)不过不要发有关政治敏感的话题呢</h4>
                    <h6>欢迎留言哦๑乛◡乛๑</h6>
                    <p style='color:gray;'><?php echo "你的IP:" . getIpaddr(); ?><br><?php echo "浏览器:" . getBrowser(); ?><br><?php echo "操作系统:" . getOs(); ?></p>
                    <p>当前留言总数：<?php echo getContentCount($conn);?></p>
                </td>
        <td><img src="../src/img/nxn.gif" width="500px" height="200px"></td>
        </table>
        <div class="gototop"><a href="#"><img src="../src/img/top.jpeg" width="50px" height="50px"/></a></div>
         <hr>
        <?php printContent($conn);?>
<form id="content_form" action="guestboard.php" method="post" class="basic-grey">
<h1>( ＾∀＾）／欢迎留言＼( ＾∀＾）</h1>
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
</select>
</label>
<label>
<span>&nbsp;</span>
<input onclick="checkContent();" type="button" class="button" value="发布" />
</label>
</form>
<footer>
    <p>©2017 <a href="http://syshaw.tk">Syshaw's Blog</a></p>
    <p>All Rights Reserved;</p>
</footer>
<script type="text/javascript">
    function checkContent(){
        var usrnm = document.getElementById('username_id').value;
        var email = document.getElementById('email_id').value;
        var cnt = document.getElementById('content_id').value;
        var form = document.getElementById("content_form");
        if (!usrnm){
            alert("喵喵喵？名字呢？");
            return;
        }
        if (!cnt) {
            alert("大兄弟，你还没写留言内容呢p(#￣▽￣#)o");
            return;
        }
        form.submit();
    }
    function setCookie(){
        var scrollTop=Math.max(document.documentElement.scrollTop,document.body.scrollTop);
    }
</script>
    </body>
</html>

