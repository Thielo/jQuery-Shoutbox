<?php
	/* config */
	$ajax_anzahlmsg = 5; /*Anzahl der auszulesenden Einträge*/
	mysql_connect("localhost", "root", "donnerstag");
	mysql_select_db("ajax_shoutbox");
	if(!isset($_POST['action'])){ $action = 'fetch'; }else{ $action = $_POST['action']; } /* Check what kind of action do we do? */
	if($action == "fetch"){
		$postsCount = 1;
		$sql_query = mysql_query("SELECT * FROM shoubox ORDER BY 'date' DESC LIMIT 0,$ajax_anzahlmsg");
		while($row = mysql_fetch_assoc($sql_query)){
			$name= htmlentities(stripslashes(htmlspecialchars($row['name'])));
			$message = htmlentities(stripslashes(htmlspecialchars($row['message'])));
			if($postsCount & 1){ $postClass = 'odd'; }else{ $postClass = 'even'; }
			echo '<div class="post '.$postClass.'" id="post'.$postsCount.'">
					<div class="metaInfo"><abbr title="Am '.date('d.m.Y H:i:s', $row['date']).'">'.$name.'</abbr> schrieb:</div>
					<div class="text"><p>'.$message.'</p></div>
				</div>';
			$postsCount++;
		}
	}
	if($action == "write"){
		$name= stripslashes(htmlspecialchars($_POST['name']));
		$message = stripslashes(htmlspecialchars($_POST['message']));
		mysql_query("INSERT INTO shoubox (name, message, ip, date) VALUES ('".$name."', '".$message."', '".$_SERVER['REMOTE_ADDR']."', '".time()."')");
		header('Location: index.php');
	}
	
?>