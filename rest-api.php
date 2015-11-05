<?php
	function get_info_by_id() {
		$info = array();
		mysql_connect('localhost', 'root',' ');
		mysql_select_db('coba);
		$info = mysql_query('SELECT * FROM ini nama table WHERE id=$id');
		return $info;
	
		if (isset ($_GET["action"])) {
			switch ($_GET["action"]) {
				case "get_info";
					if (isset($_GET["id"]))
						$value = get_info_by_id(["id"]);
					else
						$value = "ERROR";
					break;
			}
		}
	}
	exit (json_encode($value));
?>
