<?php
function html_escape($word){
  return htmlspecialchars($word, ENT_QUOTES, 'UTF-8');
}

function GetPost($name){
  /**
  *POSTされた内容を、trimして配列として返す
  */
  $array = [];
  if(!isset($name)){
    foreach ($_POST as $key => $value) {
      $array[$key] = trim($value);
    }
    return $array;
  }
  if(!$_POST[$name]){
    return ["error","該当するキーはありません"];
  }
  if (is_array($_POST[$name])) {
    foreach ($_POST[$name] as $key => $value) {
      $array[$key] = trim($value);
    }
    return $array;
  }else{
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
