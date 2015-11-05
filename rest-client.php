<?php
	# http://localhost/rest_client.php?action=get_info&id=n
	if (isset($_GET["action"]) && isset($_GET["id"]) && isset ($_GET["action"]) == "get_info") {
		$info = file_get_contents ('http://localhost/Progif/rest-api.php?action=get_info&id=' . $_GET["id"]);
		echo $info;
		$info = json_decode ($info, true);
	}
?>

<table>
	<tr>
		<td> ID </td>
		<td> | </td>
		<td> <?php echo $info["id"]?> </td>
	</tr>
	<tr>
		<td> Member Name </td>
		<td> | </td>
		<td> <?php echo $info["member_name"]?> </td>
	</tr>
	<tr>
		<td> Join Year </td>
		<td> | </td>
		<td> <?php echo $info["join_year"]?> </td>
	</tr>
</table>
