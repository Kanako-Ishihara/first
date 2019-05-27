<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>list</title>
</head>


<?php
    require_once('./helpers/db_helper.php');

    $dbh = get_db_connect();
    $sql = 'SELECT code as 社員番号,name as 社員名, name_kana as "社員名 かな",
      case gender when 1 then "男" when 2 then "女" else "不明" end as "性別",
      created_at as 登録日, updated_at as 更新日 FROM user';
    echo $sql.'<br />';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $data[] = $row;
    }
    var_dump($data[0]);
 ?>

<body>
  <button type="button" onclick="location.href=''">追加</button>
  <!-- 未実装 -->
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
<?php echo count($data);
foreach ($data as $emp_num => $emp_data) { ?>
  <tr>
    <?php foreach ($emp_data as $key => $value){?>
      <td><?php echo $value; ?></td>
    <?php } ?>
    <td><button type="button">編集</button></td>
    <td><button type="button">削除</button></td>
  </tr>
<?php } ?>
  </table>
</body>
</html>
