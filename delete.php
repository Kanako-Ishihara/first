<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>delete</title>
	</head>

<?php
require_once('./helpers/db_helper.php');
echo $_SERVER['REQUEST_METHOD'];
var_dump($_POST);
$id = $_POST['id'];
// $sql = 'DELETE FROM user WHERE id = $id ';
// $dbh = get_db_connect();
// ChangeDbSql($sql,$dbh);
?>
	<body>
		<button type="button" onclick="location.href='./list.php'">一覧に戻る</button>
	</body>
</html>
