<?php
	class API {
		function helloworld () {
			return "Hello World!";
		}
		function addition ($a,$b) {
			return $a+$b;
		}
		function getMember () {
			mysql_connect('localhost','root','');
			mysql_select_db('petparadise');
			$result = mysql_query('SELECT MemberID, Nama, Alamat_Kota FROM member');
			$teks="<br><br><h1>DATA MEMBER PETPARADISE</h1><br>";
			while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
				foreach ($row as $column) {
					$teks = $teks . $column . "<br>";
				}
				$teks = $teks . "--------------------------------------------------------------------------------------- <br>";
			}
			return $teks;
		}
	}
	$opt = array ('uri'=>'http://localhost/Progif');
	$server = new SoapServer (NULL, $opt);
	$server -> setClass ('API');
	$server -> handle();
?>
