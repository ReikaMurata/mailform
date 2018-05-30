<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>フォームテスト</title>
	<link href="style.css" rel="stylesheet" media="all">
</head>
<body>
	<div class="wrap">
		<h1>エラー</h1>
		$error$
		<form action="form.php" method="post">
			<dl class="item-box">
				<dt>お名前</dt>
				<dd><input type="text" name="お名前" placeholder="例）山田　太郎" value="$お名前$" required></dd>
			</dl>
			<dl class="item-box">
				<dt>フリガナ</dt>
				<dd><input type="text" name="カナ" placeholder="例）ヤマダ　タロウ" value="$カナ$" pattern="[\u30A1-\u30FF|　| ]*" required></dd>
			</dl>
			<dl class="item-box">
				<dt>お問い合わせ種別</dt>
				<dd>
					<input type="checkbox" value="見積もり" name="ご要望[]" id="type01"><label for="type01">見積もり</label>
					<input type="checkbox" value="制作" name="ご要望[]" id="type02"><label for="type02">制作</label>
					<input type="checkbox" value="お問い合わせ" name="ご要望[]" id="type03"><label for="type03">お問い合わせ</label>
				</dd>
			</dl>
			<dl class="item-box">
				<dt>性別</dt>
				<dd>
					<input type="radio" name="性別" value="男性" id="gender1"><label for="gender1">男性</label>
					<input type="radio" name="性別" value="女性" id="gender2"><label for="gender2">女性</label>
				</dd>
			</dl>
			<dl class="item-box">
				<dt>オプション</dt>
				<dd>
					<select name="オプション" id="option">
						<option value="">選択して下さい</option>
						<option value="2018年1月1日">2018年1月1日</option>
						<option value="2018年1月2日">2018年1月2日</option>
					</select>
				</dd>
			</dl>
			<dl class="item-box">
				<dt>メールアドレス</dt>
				<dd><input type="email" name="メールアドレス" placeholder="例）murata@magnets.jp" value="$メールアドレス$" required></dd>
			</dl>
			<dl class="item-box">
				<dt>電話番号</dt>
				<dd><input type="tel" name="電話番号" placeholder="例）090-0000-0000" pattern="\d{1,5}-?\d{1,4}-?\d{4,5}" value="$電話番号$" required></dd>
			</dl>
			<dl class="item-box">
				<dt>メッセージ</dt>
				<dd><textarea name="メッセージ">$メッセージ$</textarea></dd>
			</dl>
			<input type="submit" value="確認">
		</form>
	</div>
</body>
</html>