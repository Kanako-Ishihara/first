<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>list</title>
</head>

<?php
try {
  $dbh = new PDO("mysql:host=192.168.199.3; dbname=company; charset=utf8", 'root', 'cent_Kagi10');
  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_SILENT);
  $sql = '
  SELECT code as 社員番号,name as 社員名, name_kana as "社員名 かな",gender FROM user
  ';

  $data = $dbh->query($sql);
  echo "no error　<br />";
  var_dump($dbh->errorCode());
  echo "<br />";
  var_dump($dbh->errorInfo());
} catch (\Exception $e) {
  echo $e->getMessage();
	die();
}


echo $data;
 ?>

<body>
  <button type="button" onclick="location.href=''">追加</button>

  <br>

  <div>社員一覧表</div>
  <table border="1">
    <tr>
      <td>社員番号</td>
      <td>社員名</td>
      <td>社員名(かな)</td>
      <td>性別</td>
      <td>登録日</td>
      <td>更新日</td>
      <td>編集</td>
      <td>削除</td>
    </tr>


    <tr>
      <td>1</td>
      <td>平川勇太</td>
      <td>ひらかわゆうた</td>
      <td>男性</td>
      <td>2018-12-1 09:00:00</td>
      <td>2018-12-1 09:00:00</td>
      <td><button type="button">編集</button></td>
      <td><button type="button">削除</button></td>
    </tr>

  </table>
</body>
</html>
