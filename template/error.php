<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>フォームテスト</title>
	<style>
		html,body{
			width: 100%;
			height: 100%;
		}
		body{
			text-align: center;
			position: relative;
		}
		.wrap{
			position: absolute;
			left: 50%;
			top: 50%;
			transform: translate(-50%, -50%);
		}
	</style>
</head>
<body>
	<div class="wrap">
		<h1>エラー</h1>
		$error$
		<form action="form.php" method="post">
			<div>
				<input type="text" name="お名前" placeholder="例）山田" value="$お名前$">
			</div>
			<div>
				<input type="text" name="カナ" placeholder="例）ヤマダ" value="$カナ$">
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
			<div>
				<select name="オプション" id="option">
					<option value="">選択して下さい</option>
					<option value="2018年1月1日">2018年1月1日</option>
					<option value="2018年1月2日">2018年1月2日</option>
				</select>
			</div>
			<div>
				<input type="email" name="メールアドレス" placeholder="例）murata@magnets.jp" value="$メールアドレス$">
			</div>
			<div>
				<input type="date" name="日付" value="$日付$">
			</div>
			<div>
				<textarea name="メッセージ">$メッセージ$</textarea>
			</div>
			<input type="submit" value="送信">
		</form>
	</div>
</body>
</html>