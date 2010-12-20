<?php

/* Configuration File */
/* Message Count for function fetch() */

function messageCountSet($cnt){
	if(isset($cnt) && $cnt != ''){
		if($cnt=='all' || is_numeric($cnt) && $cnt >= '1'){
			if($cnt=='all'){
				$count='all';
			}else{
				$count=$cnt;
			}
		}else{
			$count=5;
		}
	}else{
		$count = 5;
	}
	return $count;
}
/* Database Connection */
mysql_connect("localhost", "root", "donnerstag");
mysql_select_db("ajax_shoutbox");

?>