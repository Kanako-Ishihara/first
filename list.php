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
  <br>

<form id="update" action="./update_form.php" method="post">
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
