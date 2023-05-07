<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>パスワード</title>
</head>

<body>
    <h4>0J0X0XX神戸電子</h4>
    <?php
    echo '<p>入力されたユーザーIDは、' . $_POST['userid'] . 'です。</p>';
    echo '<p>入力されたパスワードは、'  . $_POST['password'] . 'です。</p>';
    ?>
    <a href='password.html'>戻る</a>
    </form>
</body>

</html>