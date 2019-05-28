<?php

function GetDbConnect(){
  try{
    $dsn = 'mysql:dbname=company;host=192.168.199.3;charset=utf8' ;
    $user = 'root';
    $password = 'cent_Kagi10';

    $dbh = new PDO($dsn, $user, $password);
  }catch(PDOException $e){
    echo($e->getMessage());
    die();
  }
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $dbh;
}

function ChangeDbSql($sql,$dbh){
  $stmt = $dbh->prepare($sql);
  if($stmt->execute()){
    return TRUE;
  }else{
    return FALSE;
  }
}

// function bindValue(){
///**
// *@param varchar $sql SQL文の本体です。
// *@param array   $bindValues　bindの必要がある文字列を、１元配列で入れます。
// */
//   $stmt->bindValue(':name', $name, PDO::PARAM_STR);
// }

function SelectSQL($sql,$dbh){
  /**
  *@param varchar $sql SQL文
  *@param dbh   $dbh　new PDOで生成されたデータ
  */
  $stmt = $dbh->prepare($sql);
  if($stmt->execute()){
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      $data[] = $row;
    }
    return $data;
  }else{
    return "エラー　SQL文は正しいですか？";
  }
}



// function email_exists($dbh, $email){
//
//   $sql = "SELECT COUNT(id) FROM members WHERE email = :email";
//   $stmt = $dbh ->prepare($sql);
//   $stmt->bindValue('email', $email, PDO::PARAM_STR);
//   $stmt->execute();
//   $count = $stmt->fetch(PDO::FETCH_ASSOC);
//   if($count['COUNT(id)'] > 0){
//     return TRUE;
//   }else{
//     return FALSE;
//   }
// }
//
// function insert_member_data($dbh, $name, $email, $password){
//   $password = password_hash($password, PASSWORD_DEFAULT);
//   $date = date('Y-m-d H:i:s');
//   $sql = "INSERT INTO members (name, email, password, created) VALUE (:name, :email, :password, '{$date}')";
//   $stmt = $dbh->prepare($sql);
//   $stmt->bindValue(':name', $name, PDO::PARAM_STR);
//   $stmt->bindValue(':email', $email, PDO::PARAM_STR);
//   $stmt->bindValue(':password', $password, PDO::PARAM_STR);
//   if($stmt->execute()){
//     return TRUE;
//   }else{
//     return FALSE;
//   }
// }
//  function select_member($dbh, $email, $password){
//    $sql = 'SELECT * FROM company';
//    $stmt = $dbh->prepare($sql);
//    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
//    $stmt->execute();
//    var_dump($stmt);
//    if($stmt->rowCount() > 0){
//      $data = $stmt->fetch(PDO::FETCH_ASSOC);
//      if(password_verify($password, $data['password'])){
//        return $data;
//      }else{
//        return FALSE;
//      }
//      return FALSE;
//    }
//  }
