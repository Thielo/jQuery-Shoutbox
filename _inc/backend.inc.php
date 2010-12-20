<?php
	$header  = "HTTP/1.0 200 OK";
	$header .= "Content-Type: text/html; charset=UTF-8";
	$header .= "Cache-Control: no-store, no-cache, must-revalidate";
	$header .= "Cache-Control: post-check=0, pre-check=0";
	$header .= "Pragma: no-cache";
	$header .= "Content-Transfer-Encoding: 8bit";
	header($header);
	include('config.inc.php');
	/* Pre Set $action */
	if(isset($_GET['count'])){ $count = messageCountSet($_GET['count']); }else{ $count = messageCountSet(''); }
	if(!isset($_POST['action'])){ $action = 'fetch'; }else{ $action = $_POST['action']; }
	
	/* Fetch entries from databse */
	if($action == "fetch"){
		$postsCount = 1; /* Post count */
		if($count >= '1'  && is_numeric($count) && $count != 'all'){
			$sql_query = mysql_query("SELECT * FROM shoubox ORDER BY date DESC LIMIT 0,$count");
		}else{
			$sql_query = mysql_query("SELECT * FROM shoubox ORDER BY date DESC");
		}
		while($row = mysql_fetch_assoc($sql_query)){
			$name= stripslashes($row['name']);
			$message = stripslashes($row['message']); /* Old: htmlentities(stripslashes(htmlspecialchars($row['message']))); */
			if($postsCount & 1){ $postClass = 'odd'; }else{ $postClass = 'even'; }
			if(isset($_GET['call']) && $_GET['call'] == 'json'){
				echo '{
					"date": "'.date('d.m.Y H:i:s', $row['date']).'",
					"name": "'.$name.'",
					"message": "'.$message.'",
					"ids": ["'.$row['id'].'",'.$postsCount.', '.$postClass.']
				}<br />';
			}else{
				echo '<div class="post '.$postClass.'" id="post'.$postsCount.'">
						<div class="metaInfo"><abbr title="Am '.date('d.m.Y H:i:s', $row['date']).'">'.$name.'</abbr> schrieb:</div>
						<div class="text"><p>'.$message.'</p></div>
						</div>';
			}
			$postsCount++;
		}
	}
	
	/* Write a new entry to the database */
	if($action == "write"){
		$name= stripslashes(htmlspecialchars($_POST['name']));
		$message = stripslashes(htmlspecialchars($_POST['message']));
		mysql_query("INSERT INTO shoubox (name, message, ip, date) VALUES ('".$name."', '".$message."', '".$_SERVER['REMOTE_ADDR']."', '".time()."')");
		/* AJAX check  */
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') { die(); }
		header('Location: index.php'); /* not ajax, do more.... */
	}
?>