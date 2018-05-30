<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>フォームテスト</title>
	<link href="style.css" rel="stylesheet" media="all">
</head>
<body>
	<div class="wrap">
		<h1>確認画面</h1>
		<form action="form.php" method="post">
			$hidden$
			<dl class="item-box">
				<dt>お名前</dt>
				<dd>$お名前$</dd>
			</dl>
			<dl class="item-box">
				<dt>フリガナ</dt>
				<dd>$カナ$</dd>
			</dl>
			<dl class="item-box">
				<dt>ご要望</dt>
				<dd>$ご要望$</dd>
			</dl>
			<dl class="item-box">
				<dt>性別</dt>
				<dd>$性別$</dd>
			</dl>
			<dl class="item-box">
				<dt>オプション</dt>
				<dd>$オプション$</dd>
			</dl>
			<dl class="item-box">
				<dt>メールアドレス</dt>
				<dd>$メールアドレス$</dd>
			</dl>
			<dl class="item-box">
				<dt>電話番号</dt>
				<dd>$電話番号$</dd>
			</dl>
			<dl class="item-box">
				<dt>メッセージ</dt>
				<dd>$メッセージ$</dd>
			</dl>
			<input type="submit" value="送信">
		</form>
	</div>
</body>
</html>