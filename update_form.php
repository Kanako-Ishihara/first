<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>update</title>
</head>

<?php require_once('./helpers/extra_helper.php');
require_once('./helpers/db_helper.php');
$posted_array = GetPost();
$id = $posted_array["id"];
$sql = "SELECT * FROM user WHERE id = '{$id}'";
$dbh = GetDbConnect();
$data = SelectSQL($sql,$dbh)[0];
$gender_array = ["","",""];
$gender_array[$data["gender"]] = "checked";
?>

<body>
  <div>編集</div>
  <form action="./update.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">

    <table border="1">

      <tr>
        <td>社員番号</td>
        <td><input type="text" name="code" value="<?php echo $data['code']; ?>" required></td>
      </tr>

      <tr>
        <td>社員名</td>
        <td><input type="text" name="name" value="<?php echo $data['name']; ?>" required></td>
      </tr>

      <tr>
       <td>社員名 かな</td>
       <td><input type="text" name="name_kana" value="<?php echo $data['name_kana']; ?>" required></td>
      </tr>

      <tr>
        <td>性別</td>
        <td>
          <input type="radio" name="gender" value=1 <?php echo $gender_array[1]; ?> required>男<br>
          <input type="radio" name="gender" value=2 <?php echo $gender_array[2]; ?> required>女<br>
          <input type="radio" name="gender" value=0 <?php echo $gender_array[0]; ?> required>選択しない
        </td>
      </tr>

    </table>

    <button type="button" onclick="location.href='./list.php'">戻る</button>
    <button type="submit">保存</button>

  </form>

</body>
</html>
