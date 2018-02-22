<!DOCTYPE html>
<html>
<head>
  <title>博客(syshaw's blog)</title>
  <link href="../src/css/blog.css" media="screen" rel="stylesheet" type="text/css" />
  <script src="../src/js/jquery.js"></script>
</head>

<body>
	<div class="blog_top">
		<a href="/error.html" target="view_window">首页</a>
		<a href="/guestboard" target="view_window">留言板</a>
		<a href="/about" target="view_window">关于我</a>
	</div>
	<div class="blog_left">
	
	</div>
	<iframe id="view_window_id" name="view_window" class="blog_iframe" frameborder="0" scrolling="auto"></iframe>
	<script type="text/javascript">
//		$(document).ready(function(){
		$(".blog_top").hover(function(){
			$(".blog_top").animate({height:"50px"},50);
			$(".blog_top a").animate({height:"50px"},50);
		},function(){
			$(".blog_top").animate({height:"25px"},10);
			$(".blog_top a").animate({height:"25px"},10);
			});
//		});
	/*	$('#view_window_id').scroll(function(){
			#view_window_id
	*/
//		});
	//animate
	/*	$(window).resize(function(){
			var w = $('#view_window_id').width();
			if (w > 850) $('#view_window_id').width(800);
			if (w < 750) $('#view_window_id').width(750);
		});
		*/
	</script>
</body>
</html>