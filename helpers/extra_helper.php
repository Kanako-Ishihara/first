<?php
function html_escape($word){
  return htmlspecialchars($word, ENT_QUOTES, 'UTF-8');
}

function GetPost($name){
  /**
  *POSTされた内容を、trimして配列として返す
  */
if(!isset($name) /**すべて抽出*/){
    foreach ($_POST as $key => $value) {
      $array[$key] = trim($value);
    }
    return $array;
  }

  //特定のキーを持つ部分だけを抽出
  if(!$_POST[$name] /**該当キーなし*/){
    return ["error","該当するキーはありません"];
  }
if (is_array($_POST[$name])/** 特定キーを持つのが配列の時、中身の配列を取り出す*/) {
    foreach ($_POST[$name] as $key => $value) {
      $array[$key] = trim($value);
    }
    return $array;
  }else /** キーの中に値が入っているとき、キーと値をセットで返す*/{
    $array = [$name,trim($_POST[$name])];
    return $array;
  }
}

function CheckWords($word, $length){
  if(mb_strlen($word) === 0){
    return FALSE;
  }elseif(mb_strlen($word) > $length){
    return FALSE;
  }else{
    return TRUE;
  }
}
