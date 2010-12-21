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
$setOddEven = 1;
mysql_connect("YourDatabaseHost", "YourDatabaseUser", "YourDatabasePassword");
mysql_select_db("YourDatabase");

?>