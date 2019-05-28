<!DOCTYPE html>
<html lang="jp">
	<head>
		<meta charset="utf-8">
		<title>update</title>
	</head>
	<body>

		<?php
		require_once('./helpers/db_helper.php');
		require_once('./helpers/extra_helper.php');
		$id = GetPost('id')[1];
		$code = GetPost('code')[1];
		$name = GetPost('name')[1];
		$name_kana = GetPost('name_kana')[1];
		$gender = GetPost('gender')[1];

		$dbh = GetDbConnect();
		$sql = "UPDATE user SET code = '{$code}',name = '{$name}', name_kana = '{$name_kana}', gender = {$gender} WHERE id = {$id}";
		if(ChangeDbSql($sql,$dbh) === TRUE){
			echo "更新しました";
		}else {
			echo "更新に失敗しました";
		}
		?>
	</body>
</html>
