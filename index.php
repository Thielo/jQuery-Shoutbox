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
	<div class="wrapper">
		
		<h1>Ajax Shoutbox</h1>
		
		<div id="shoutbox" class="wrapper">
			<div id="entries"><noscript><?php include('_inc/backend.inc.php'); ?></noscript></div>
			<form id="shout" class="wrapper" action="backend.inc.php" method="post">
				<input type="hidden" name="format" value="json" />
				<input type="hidden" name="action" value="write">
				<div class="relative">
					<label for="name" class="left absolute">Name</label>
					<input class="right" type="text" name="name" id="name" >
				</div>
				<div class="clear relative">
					<label for="message" class="left absolute">Nachricht</label>
					<textarea class="right" name="message" id="message"></textarea>
				</div>
				<input type="submit" value="Senden" class="submit" name="submit">
			</form>
		</div>
		
	</div>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	<script>!window.jQuery && document.write('<script src="_js/jquery.js"><\/script>')</script>
	<script src="_js/jquery.infieldlabel.min.js?v=1"></script>
	<script src="_js/script.js?v=1"></script>
</body>
</html>
