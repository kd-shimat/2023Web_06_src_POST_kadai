<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<title>テキストエリア</title>
</head>

<body>
	<h4>0J0X0XX神戸電子</h4>
	入力された文章は次の通りです。
	<?php
	echo '<p>' . $_POST['textarea'] . '</p>';
	?>
	<a href='textarea.html'>戻る</a>
	</form>
</body>

</html>