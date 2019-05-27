<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>list</title>
</head>


<?php
    require_once('./helpers/db_helper.php');

    $dbh = get_db_connect();
    $sql = 'SELECT code as 社員番号,name as 社員名, name_kana as "社員名 かな",gender FROM user';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $data[] = $row;
    }
    var_dump($data);
 ?>

<body>
  <button type="button" onclick="location.href=''">追加</button> //未実装

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
