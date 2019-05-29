<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>list</title>
</head>

<?php
    require_once('./helpers/db_helper.php');

    $dbh = GetDbConnect();
    $sql = 'SELECT id,code as 社員番号,name as 社員名, name_kana as "社員名 かな",
      case gender when 1 then "男" when 2 then "女" else "不明" end as "性別",
      created_at as 登録日, updated_at as 更新日 FROM user';
    $data = SelectSQL($sql,$dbh);
 ?>

<body>
  <button type="button" onclick="location.href='./insert_form.php'">追加</button>
  <button type="button" onclick="location.href='./search_form.php'">検索</button>
  <br>

<form id="update" action="./update_form.php" method="post">
  <div>社員一覧表</div>
  <table border="1">
    <tr>
      <th>社員番号</th>
      <th>社員名</th>
      <th>社員名(かな)</th>
      <th>性別</th>
      <th>登録日</th>
      <th>更新日</th>
      <th>編集</th>
      <th>削除</th>
    </tr>
<?php foreach ($data as $emp_num => $emp_data) { ?>
  <tr>
    <?php foreach ($emp_data as $key => $value){
      if ($key != "id") { ?>
        <td><?php echo $value; ?></td>
      <?php }
    }?>
      <td><button type="submit" value="<?php echo $data[$emp_num]["id"];?>" name="id">編集</button></td>
      <td><button type="submit" value="<?php echo $data[$emp_num]["id"];?>" formaction="./delete.php" name="id">削除</button>
      </td>
  </tr>
</form>

<?php }?>
  </table>
</body>
</html>
