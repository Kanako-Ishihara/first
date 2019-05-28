<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>delete</title>
	</head>

<?php
require_once('./helpers/db_helper.php');
$id = $_POST['id'];
$sql = "DELETE FROM user WHERE id = '{$id}'";
$dbh = GetDbConnect();
if(ChangeDbSql($sql,$dbh) === TRUE){
	echo "削除に成功しました。";
}else{
	echo "削除に失敗しました。";
}
;
?>
	<body>
		<button type="button" onclick="location.href='./list.php'">一覧に戻る</button>
	</body>
</html>
