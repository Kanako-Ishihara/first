<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>insert</title>
</head>

<?php
// idの重複やページの再読み込みなどには対応していない。
require_once('./helpers/db_helper.php');
require_once('./helpers/extra_helper.php');
require_once('./helpers/validation_helper.php');

$posted_values = GetPost();
var_dump($posted_values);
$post_txt_array = [$posted_values[code],$posted_values[name],$posted_values[name_kana]];
// var_dump($post_txt_array);
?>

<body>
<?php
$have_error = false;
$dbh = GetDbConnect();
// 入力値をチェック
$error_mes = "";
foreach ($post_txt_array as $key => $value) {
  $tmp_err = textValidation($value,255);
  if (!$tmp_err == '') {
    $have_error = True;
    $error_mes .= $key."： ".$tmp_err."<br />";
  }
}
if (!$gender){
  $error_mes .= "性別が指定されていません。<br />";
  $have_error = True;
} elseif (numValidation($gender,0,2)) {
  $error_mes .= numValidation($gender,0,2);
  $have_error = True;
}
// 入力値を表示
foreach ($posted_values as $key => $value) {
  if ($key != "id"){
    echo $key."：　".$value."<br />";
  }
}

if (!$have_error) {
  $sql =
  "INSERT INTO user(code,name,name_kana,gender)
  VALUES ('{$posted_values["code"]}','{$posted_values["name"]}','{$posted_values["name_kana"]}','{$posted_values["gender"]}')";
  if(ChangeDbSql($sql,$dbh) === TRUE){
    echo "<p>以上のデータについて、挿入が成功しました。</p>";
  }else{
    echo 'データの挿入に失敗しました。';
  }
}else{
  echo "<p>以下の問題により、データが挿入できませんでした。<br />".$error_mes."</p>";
}

  ?>
  <button type="button" onclick="location.href='./list.php'">一覧に戻る</button>
  <button type="button" onclick="location.href='./insert_form.php'">社員追加覧に戻る</button>
</body>
</html>
