<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>insert</title>
</head>

<body>
  <div>追加</div>
  <form method="post" action="./insert.php">

    <table border="1">

      <tr>
        <td>社員番号</td>
        <td><input type="text" name="id"></td>
      </tr>

      <tr>
        <td>社員名</td>
        <td><input type="text" name="name"></td>
      </tr>

      <tr>
       <td>社員名(かな)</td>
       <td><input type="text" name="name_kana"></td>
      </tr>

      <tr>
        <td>性別</td>
        <td>
          <input type="radio" name="gender" value=1 >男性<br>
          <input type="radio" name="gender" value=2>女性<br>
          <input type="radio" name="gender" value=0>選択しない
        </td>
      </tr>

    </table>

    <button type="button" onclick="location.href='./list.php'">戻る</button>
    <button type="submit">追加</button>

  </form>
</body>
</html>
