<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>insert</title>
</head>
<?php
$id = $_POST['id'];
$name = $_POST['name'];
$name_kana = $_POST['name_kana'];
$gender = $_POST['gender'];
 ?>
<body>
  <?php echo $id.' '.$name.' '.$name_kana.' '.$gender; ?>
  <button type="button" onclick="location.href='./list.php'">一覧に戻る</button>
</body>
</html>
