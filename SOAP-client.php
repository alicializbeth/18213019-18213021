/* SOAP-client.php
3rd Integrative Programming Assignment
by: Alicia Lizbeth (18213019) and Eveline Purnomo (18213021)*/

<?php
	$opt = array ('location'=>'http://localhost/Progif/SOAP-server.php',
	'uri'=> 'http://localhost/Progif');
	$a = 4;
	$b = 7;
	$api = new SoapClient (NULL, $opt);
	echo $api -> helloworld();
	echo "<br>Addition: ";
	echo $api -> addition ($a, $b);
	echo $api -> getMember();
?>
