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
		<h1>確認画面</h1>
		<form action="form.php" method="post">
			$hidden$
			<div>
				$お名前$
			</div>
			<div>
				$カナ$
			</div>
			<div>
				$ご要望$
			</div>
			<div>
				$性別$
			</div>
			<div>
				$オプション$
			</div>
			<div>
				$メールアドレス$
			</div>
			<div>
				$電話番号$
			</div>
			<div>
				$メッセージ$
			</div>
			<input type="submit" value="送信">
		</form>
	</div>
</body>
</html>