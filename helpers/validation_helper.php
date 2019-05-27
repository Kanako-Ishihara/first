<?php
require_once('./helpers/extra_helper.php');
function textValidation($txt,$num){
	$error_mes = '';
	if (!check_words($txt,$num)) {
		$error_mes = $num."文字以内で入力してください。必須です。";
	}
	return $error_mes;
}

function numValidation($num,$first,$last){
	if ($num < $first || $num > $last) {
		return $first."から".$last."の範囲で値を設定してください。必須です。";
	}
}
 ?>
