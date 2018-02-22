<?php
require("php/mysql_conf.php");
?>
<!DOCTYPE html>
<html>
<head>

    <title id="rh_title">导航页</title>
    <link rel="icon" href="src/img/ioc.jpg" type="image/x-icon"/>
    <link rel="stylesheet" href="src/css/index.css">
    </head>
</head>
<body>
<!-- 代码begin -->
	<br>
    	<h1 style="color:#ef4300;">Welcome</h1>
        <h1 id="rh_top">Syshaw's Personal Website</h1>
	<iframe src="http://music.163.com/outchain/player?type=2&amp;id=471942&amp;auto=1&amp;height=66" width="250px" height="86" frameborder="no" marginwidth="0" marginheight="0"></iframe>
    <div class="lanrenzhijia">
        <ul>
            <li class="on"><a href='/'>首页</a></li>
            <li><a href='blog'>我的博客</a></li>
            <li><a href='guestboard'>留言板</a></li>
	<li><a href='/webgl'>webgl</a></li>
            <li><a href='about'>关于</a></li>
        </ul>
          <div class="hover"></div>
    </div>
	<img src="src/img/lovely.gif" width="350px" height="150px"/>
	<p style='color:gray;'>网站访问总量:<?php echo getViews($conn); ?></p>
        <footer>
            <p>©2017 <a href="http://syshaw.tk">Syshaw's Blog</a></p>
            <p>All Rights Reserved;</p>
         </footer>
<script src="src/js/jquery.js"></script>
<script>
    $(function(){
        var Height = 40; //li的高度
        var pTop = 50; // .lanrenzhijia 的paddding-top的值
        $('.lanrenzhijia li').mouseover(function(){
            $(this).addClass('on').siblings().removeClass('on');
            var index = $(this).index();
            var distance = index*(Height+1)+pTop+'px'; //如果你的li有个border-bottom为1px高度的话，这里需要加1
            $('.lanrenzhijia .hover').stop().animate({top:distance},150); //默认动画时间为150毫秒，懒人们可根据需要修改
        });
    });
</script>
<!-- 代码end -->
<script type="text/javascript" src="//cdn.bootcss.com/canvas-nest.js/1.0.1/canvas-nest.min.js"></script>
</body>
</html>
