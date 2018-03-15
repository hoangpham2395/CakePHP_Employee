<form action method="post" enctype="multipart/form-data">
	<table style="margin-top:30px;">
		<tr>
			<td><input type="file" class="art-button" name="file"></td>
			<td><button type="submit" class="btn btn-default" name="import">Import</button> </td>
		</tr>
	</table>
</form>
<?php
	if ($_POST['import']) {
		$host = "localhost:8080";
		$db_user = "root";
		$db_password = "";
		$db = "user_manage";
		$conn = mysql_connect($host, $db, $db_user, $db_password) or die("Can't connect to database");
		mysql_select_db($db) or die ("Can't select database");
		$file_name = $_FILE['file']['tmp_name'];

		if ($_FILE['file']['size'] > 0) {
			$file = fopen($file_name, "r");
			while (($userData = fgetcsv($file,1000,",")) !== false) {
				$sql = "INSERT INTO users (id, username, password, fullname, email_company, email_personal, chatwork, skype, tel, gender, birthday, department, position, user_type, skill, literacy, contract_type, work_address, status, address, bank_account, id_number, join_datetime, leave_days_have, leave_days_took, del_flag, created, modified) VALUES ($userData[0], $userData[1], $userData[2], $userData[3], $userData[4], $userData[5], $userData[6], $userData[7], $userData[8], $userData[9], $userData[10], $userData[11], $userData[12], $userData[13], $userData[14], $userData[15], $userData[16], $userData[17], $userData[18], $userData[19], $userData[20], $userData[21], $userData[22], $userData[23], $userData[24]), 0, date('Y-m-d h:m:s', date('Y-m-d h:m:s')";
				mysql_query($sql);

				$db = @new mysql('localhost', 'root', '', 'user_manage');
				if ($db->connect_errno) {
					die ("Can't connect database <br>".$db->connect_error);
				}
			}
			fclose($file);
			echo "<div class='success'>Imported data success!</div>";
		}
	}
?>