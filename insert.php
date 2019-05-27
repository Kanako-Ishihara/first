<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>insert</title>
</head>

<?php
// idの重複やページの再読み込みなどには対応していない。
require_once('./helpers/db_helper.php');
$id = -1;
$name = '';
$name_kana = '';
$gender = -1;

$id = $_POST['id'];
$name = $_POST['name'];
$name_kana = $_POST['name_kana'];
$gender = $_POST['gender'];

?>

<body>
  <?php
  // echo '初期段階'.$id.' '.$name.' '.$name_kana.' '.$gender.'<br />';

  $dbh = get_db_connect();
  $sql =
  "INSERT INTO user(code,name,name_kana,gender)
  VALUES ('{$id}','{$name}','{$name_kana}','{$gender}')";
  $stmt = $dbh->prepare($sql);
  if($stmt->execute()){
    echo '社員番号：'.$id.'<br />社員名：'.$name.'<br />社員名 かな：'.$name_kana.' <br />性別：'.$gender." <p>以上のデータについて、挿入が成功しました。</p>";
  }else{
    echo '挿入に失敗しました。';
  }
  ?>
  <button type="button" onclick="location.href='./list.php'">一覧に戻る</button>
</body>
</html>
