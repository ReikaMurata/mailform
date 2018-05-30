<?php 
//ヘッダ
header("Content-Type:text/html;charset=utf-8");

//設定ファイル読み込み
require_once('./conf/config.php');

//内部エンコーディング設定
mb_internal_encoding("utf-8");

//言語設定
mb_language("japanese");

//NULLバイト除去
if(isset($_GET)) $_GET = sanitize($_GET);
if(isset($_POST)) $_POST = sanitize($_POST);
if(isset($_COOKIE)) $_COOKIE = sanitize($_COOKIE);

//CSRF対策（リファラーチェック）
$referer_check_result = refererCheck($referer_check,$referer_check_domain);

//-------------------------
//NULLバイト除去関数
//-------------------------
function sanitize($array){
	if(is_array($array)){
		return array_map('sanitize',$array);
	}
	return str_replace("\0","",$array);
}

//-------------------------
//入力した内容のエスケープ処理
//-------------------------
$escape_input = escapeInput($_POST);

//-------------------------
//項目チェック
//-------------------------
$require_return = requireCheck($require);
$error_message = $require_return['error_message'];
$error_flag = $require_return['error_flag'];

//-------------------------
//エラーがある場合エラー画面を表示
//-------------------------
if(!empty($error_flag) && count($error_flag)>0){
	//エラーテンプレートの有無を確認
	if(!is_file($template_path.$tpl_error)){
		exit("エラーテンプレートがありません。");
	}
	
	//エラーテンプレート読み込み
	ob_start();
	include($template_path.$tpl_error);
	$error_html = ob_get_contents();
	ob_end_clean();
	
	//エラーメッセージの差し込み（テンプレートの「$error$」としている箇所に出力させる）
	$error_html = str_replace('$error$',$error_message,$error_html);
	
	//入力した内容の保持
	foreach($escape_input as $key => $val){
		//チェックボックス
		if(is_array($val) && count($val) != 0){
			foreach($val as $vv){
				preg_match("{<input[^>]*[\'|\"]".$key."\[\][\'|\"][^>]*[\'|\"]".$vv."[\'|\"][^>]*>}si", $error_html, $matches);
				$replace = str_replace('input', "input checked=\"checked\" ", $matches[0]);
				$error_html = str_replace($matches[0], $replace, $error_html);
			}
		}
		//チェックボックス以外
		else{
			//ラジオボタンの場合
			if(preg_match("{<input[^>]*type=[\'|\"]radio[\'|\"][^>]*name=[\'|\"]".$key."[\'|\"][^>]*[\'|\"]".$val."[\'|\"][^>]*>}si", $error_html, $matches)){
				$replace = str_replace('input', "input checked=\"checked\" ", $matches[0]);
				$error_html = str_replace($matches[0], $replace, $error_html);
			}
			//セレクトボックスの場合
			elseif(preg_match("{<select[^>]*name=[\'|\"]".$key."[\'|\"][^>]*>.*?<\/select>}si", $error_html, $matches)){
				$replace = preg_replace("{([\'|\"]?".$val."[\'|\"]?[^>])>}","$1 selected=\"selected\">",$matches[0]);
				$error_html = str_replace($matches[0], $replace, $error_html);
			}
			//それ以外
			else{
				$error_html = str_replace('$'.$key.'$',$val,$error_html);
			}
		}
	}
	
	//エラーテンプレートの出力
	echo $error_html;
	exit;
}
//-------------------------
//エラーなしの場合確認画面を表示
//-------------------------
else{
	//確認画面からの送信の場合（confirm_checkの値の有無）
	if(isset($_POST['confirm_check']) && $_POST['confirm_check']==1){
		echo '送信OK';
		exit;
	}
	//確認画面の表示
	else{
		//確認画面テンプレートの有無を確認
		if(!is_file($template_path.$tpl_confirm)){
			exit("確認画面テンプレートがありません。");
		}

		//確認画面テンプレート読み込み
		ob_start();
		include($template_path.$tpl_confirm);
		$confirm_html = ob_get_contents();
		ob_end_clean();

		//確認画面に入力内容を反映
		foreach($escape_input as $key => $val){
			//チェックボックス
			if(is_array($val) && count($val) != 0){
				$array_val = '';
				foreach($val as $vv){
					$array_val .= $vv;
					//配列の最後以外は末尾にカンマ付与
					if($vv != end($val)){
						$array_val .= '、';
					}
				}
				$confirm_html = str_replace('$'.$key.'$',$array_val,$confirm_html);
			}
			else{
				$confirm_html = str_replace('$'.$key.'$',$val,$confirm_html);
			}
		}
		
		//確認画面用hidden値
		$check_str = '<input type="hidden" name="confirm_check" value="1">';
		$confirm_html = str_replace('$hidden$',$check_str,$confirm_html);
		
		//確認画面テンプレートの出力
		echo $confirm_html;
		exit;
	}
}
//-------------------------
//関数定義
//-------------------------

//リファラーチェック
function refererCheck($referer_check,$referer_check_domain){
	//リファラーチェックの設定がONになっている＆チェックするドメインが空でない場合
	if($referer_check == 1 && !empty($referer_check_domain)){
		//リファラー取得
		$referer = $_SERVER['HTTP_REFERER'];
		//リファラーの有無
		if(isset($referer)){
			//ドメインの一致を確認
			if(strpos(htmlspecialchars($referer, ENT_QUOTES, 'UTF-8'),$referer_check_domain) === false){
				return exit('リファラチェックエラー。フォームページのドメインとこのファイルのドメインが一致しません');
			}
		}else{
			return exit('リファラチェックエラー。リファラーが取得できませんでした。');
		}
	}
}

//エスケープ処理
function escapeInput($form_input){
	foreach($form_input as $key=>$val){
		$escape_input[$key] = inputSpecialChars($val);
	}
	return $escape_input;
}

//HTMLエンティティ
function inputSpecialChars($val){
	//配列の場合
	if(is_array($val)){
		//再度同じ関数を実行
		return array_map('inputSpecialChars', $val);
	}
	//それ以外
	else{
		$val = htmlspecialchars($val, ENT_QUOTES, 'UTF-8');
		if(get_magic_quotes_gpc()){
			$val = stripslashes($val);
		}
		return $val;
	}
}

//必須項目チェック
function requireCheck($require){
	$return['error_message'] = '';
	$return['error_flag'] = 0;
	
	foreach($require as $require_value){
		$require_flag = '';
		foreach($_POST as $key => $val) {
			//必須項目に指定した要素の処理
			if($key == $require_value) {
				
				//グループ要素（チェックボックス）のチェック
				if(is_array($val)){
					$group_empty = 0;
					foreach($val as $group_key => $group_value){
						if(is_array($group_value)){
							foreach($group_value as $group_key02 => $group_value02){
								if($group_value02 == ''){
									$group_empty++;
								}
							}
						}
						
					}
					if($group_empty > 0){
						$return['error_message'] .= '<p class="error-message">【'.htmlspecialchars($key, ENT_QUOTES, 'UTF-8').'】は必須項目です。</p>';
						$return['error_flag'] = 1;
					}
				}
				//デフォルト必須チェック
				elseif($val == ''){
					$return['error_message'] .= '<p class="error-message">【'.htmlspecialchars($key, ENT_QUOTES, 'UTF-8').'】は必須項目です。</p>';
					$return['error_flag'] = 1;
				}
				
				$require_flag = 1;
				break;
			}
			
		}
		if($require_flag != 1){
				$return['error_message'] .= '<p class="error-message">【'.$require_value.'】が未選択です。</p>';
				$return['error_flag'] = 1;
		}
	}
	
	return $return;
}

?>