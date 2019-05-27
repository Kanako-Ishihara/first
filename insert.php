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

$code = get_post('code');
$name = get_post('name');
$name_kana = get_post('name_kana');
$gender = get_post('gender');
$post_txt_array = [  $code,  $name,  $name_kana];
?>

<body>
  <?php
  // var_dump($post_array);
  // echo '初期段階<br />';
$have_error = false;
$dbh = get_db_connect();
$error_mes = "";
foreach ($post_txt_array as $key => $value) {
  $tmp_err = textValidation($value,255);
  if (!$tmp_err == '') {
    $have_error = True;
    $error_mes .= "エラー箇所　第".$key."項目： ".$tmp_err."<br />";
  }
}
// numValidation();

if (!$have_error) {
  $sql =
  "INSERT INTO user(code,name,name_kana,gender)
  VALUES ('{$code}','{$name}','{$name_kana}','{$gender}')";
  $stmt = $dbh->prepare($sql);
  if($stmt->execute()){
    echo '社員番号：'.$code.'<br />社員名：'.$name.'<br />社員名 かな：'.$name_kana.' <br />性別：'.$gender." <p>以上のデータについて、挿入が成功しました。</p>";
  }else{
    echo '挿入に失敗しました。';
  }
}else{
  echo '社員番号：'.$code.'<br />社員名：'.$name.'<br />社員名 かな：'.$name_kana.' <br />性別：'.$gender." <p>以上のデータについて、挿入が失敗しました。<br />".$error_mes."</p>";
}

  ?>
  <button type="button" onclick="location.href='./list.php'">一覧に戻る</button>
  <button type="button" onclick="location.href='./insert_form.php'">社員追加覧に戻る</button>
</body>
</html>
