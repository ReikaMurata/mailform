<?php 
//-----------------------------------------
//設定ファイル
//-----------------------------------------

//管理者宛メールアドレス
$mail_to = 'murata@magnets.jp';

//CCメールアドレス
//複数人の場合は「,」で区切る
$mail_to_cc = 'reikamurata@yahoo.co.jp';

//送信元メールアドレス
$mail_from = 'murata@magnets.jp';

//自動返信メール送信元メールアドレス
$mail_from_reply = 'murata@magnets.jp';

//管理者宛の件名
$mail_subject = 'ホームページからお問い合わせがありました';

//自動返信メールの件名
$mail_reply_subject = 'お問い合わせありがとうございます';

//完了画面ファイルへのパス
$thanks_path = './thanks.php';

//テンプレートディレクトリへのパス
$template_path = './template/';

//確認画面テンプレートファイル
$tpl_confirm = 'confirm.php';

//エラー画面テンプレートファイル
$tpl_error = 'error.php';

//管理者宛メール本文
$mail = "mail.txt";

//自動返信メール本文
$mail_reply = "reply.txt";

//ログディレクトリへのパス
$log_path = './logs/';

//リファラチェックを行うか否か
// 0 -> 行なわい / 1 -> 行なう
$referer_check = 1;

//リファラチェックをする場合のみ入力
$referer_check_domain = "localhost";

//必須入力項目
//nameの値を入力する
$require = array('お名前','カナ','ご要望','メールアドレス');

?>