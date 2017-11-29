<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="icon" href="../src/img/ioc.jpg" type="image/x-icon"/>
        <title>Guestboard(留言板)</title>
<style>
* {
text-shadow: 0 1px 3px rgba(0,0,0,.2);
}
h1 {
color:#ef4300;
text-align:center;
margin:0px;
}
footer a {
font-size:18px;
display: inline-block;
color:#ef4300;
text-decoration: none;
}
footer a:hover {
background-color:gray;
color:#000000;
}
p {
color:black;
}
footer {
position:relative;
width:100%;
color:#eee;
text-align: center;
font-size: 18px;
height: 50px;
}
.gototop {
position:fixed;
width:50px;
height:50px;
right:10px;
bottom:5px;
z-index: 100;
}
</style>
    </head>
<?php
require("../php/mysql_conf.php");
?>
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
                    <p>当前留言总数：<?php echo getContentCount($conn);?></p>
                </td>
        <td><img src="../src/img/nxn.gif" width="500px" height="200px"></td>
        </table>
        <div class="gototop"><a href="#"><img src="../src/img/top.jpeg" width="50px" height="50px"/></a></div>
         <hr>
        <?php printContent($conn);?>
        <form id="content_form" action="guestboard.php" method="post">
        <p>名字(必填)：<input id="username_id" name="username" type="input"/></p>
        <p>email(可选)：<input id="email_id" name="email" type="input"></p>
        <textarea id="content_id" name="content"></textarea>
        </form>
        <button onclick="checkContent();">发布</button>
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
            alert("留言名字没有填啊喂（╯‵□′）╯︵┴─┴");
            return;
        }
        if (!cnt) {
            alert("大兄弟，你还没写留言内容呢p(#￣▽￣#)o");
            return;
        }
        form.submit();
    }
</script>
    </body>
</html>

