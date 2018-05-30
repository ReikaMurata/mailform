<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>フォームテスト</title>
	<link href="style.css" media="all">
</head>
<body>
	<div class="wrap">
		<h1>エラー</h1>
		$error$
		<form action="form.php" method="post">
			<div>
				お名前：<input type="text" name="お名前" placeholder="例）山田" value="$お名前$" required>
			</div>
			<div>
				フリガナ：<input type="text" name="カナ" placeholder="例）ヤマダ" value="$カナ$" pattern="[\u30A1-\u30FF|　| ]*" required>
			</div>
			<div>
				<input class="test" type="checkbox" name="ご要望[]" value="見積もり">見積もり
				<input class="test" type="checkbox" name="ご要望[]" value="制作">制作
				<input class="test" type="checkbox" name="ご要望[]" value="お問い合わせ">お問い合わせ
			</div>
			<div>
				<input type="radio" name="性別" value="男性" id="gender1"><label for="gender1">男性</label>
				<input type="radio" name="性別" value="女性" id="gender2"><label for="gender2">女性</label>
			</div>
			<div>オプション：
				<select name="オプション" id="option">
					<option value="">選択して下さい</option>
					<option value="2018年1月1日">2018年1月1日</option>
					<option value="2018年1月2日">2018年1月2日</option>
				</select>
			</div>
			<div>
				メールアドレス：<input type="email" name="メールアドレス" placeholder="例）murata@magnets.jp" value="$メールアドレス$" required>
			</div>
			<div>
				電話番号：<input type="tel" name="電話番号" placeholder="例）090-0000-0000" pattern="\d{1,5}-?\d{1,4}-?\d{4,5}" value="$電話番号$" required>
			</div>
			<div>
				メッセージ：<textarea name="メッセージ">$メッセージ$</textarea>
			</div>
			<input type="submit" value="送信">
		</form>
	</div>
</body>
</html>