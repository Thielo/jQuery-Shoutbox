<!DOCTYPE html>   
<!--[if lt IE 7 ]> <html lang="de" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="de" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="de" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="de" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="de" class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
	<title></title>
	<meta name="description" content="">
	<meta name="keywords" content="" />
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	
	<link rel="stylesheet" href="_css/style.css?v=1">
</head>
<body>
	<div class="clickable" id="richardthielDEStuff">
		<h1><a id="pageLink" href="http://www.richardthiel.de/" target="_blank"><span>RichardThiel.de</span></a></h1>
		<div class="text">
			<p>This Shoutbox uses jQuery for form submitting and post fetching without a page reload</p>
			<ul>
				<li>Try this Link: <a href="_inc/backend.inc.php?count=1&call=json">Limited and JSON formated Post</a></li>
				<li>The Posts are formated with an odd and an even class</li>
			</ul>
		</div>
	</div>
	<div class="wrapper">
		<h2>Ajax Shoutbox <span>&raquo; (PHP MySQL required)</span></h2>
		<div id="shoutbox" class="wrapper">
			<?php if(isset($_GET['errors']) && $_GET['errors'] != ''){ $error = explode('||',$_GET['errors']); } ?>
			<div id="entries"><noscript><?php include('_inc/backend.inc.php'); ?></noscript></div>
			<form id="shout" class="wrapper" action="_inc/backend.inc.php" method="post">
				<input type="hidden" name="format" value="json" />
				<input type="hidden" name="action" value="write">
				<div class="relative">
					<label for="name" class="left absolute">Name</label>
					<input class="right" type="text" name="name" id="name" >
					<?php if(isset($error[0]) && $error[0] == 1){ echo '<span class="error">Sie m&uuml;ssen einen Namen eingeben!</span>'; } ?>
				</div>
				<div class="clear relative">
					<label for="message" class="left absolute">Nachricht</label>
					<textarea class="right" name="message" id="message"></textarea>
					<?php if(isset($error[1]) && $error[1] == 1){ echo '<span class="error">Sie m&uuml;ssen eine Nachricht eingeben!</span>'; } ?>
				</div>
				<input type="submit" value="Senden" class="submit" name="submit">
			</form>
		</div>
		
	</div>
	<!-- http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js -->
	<script src="_js/jquery.js"></script>
	<script>!window.jQuery && document.write('<script src="_js/jquery.js"><\/script>')</script>
	<script src="_js/jquery.infieldlabel.min.js?v=1"></script>
	<script src="_js/script.js?v=1"></script>
	<script src="_js/richardthielde.js?v=1"></script>
</body>
</html>
