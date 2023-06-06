<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <title>ユーザー登録</title>
</head>
<body class="bg-light">
    <div class="container my-5 bg-white p-5 rounded-3">
        <h1 class="mb-4">ユーザー登録</h1>
        <form method="POST" action="user-insert.php">
        <div class="mb-3">
            <label for="name" class="form-label">名前</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp">
            <div id="nameHelp" class="form-text">例：T D</div>
        </div>
        <div class="mb-3">
            <label for="lid" class="form-label">ログインID</label>
            <input type="text" class="form-control" id="lid" name="lid" aria-describedby="lidHelp">
            <div id="lidHelp" class="form-text">例：td2023</div>
        </div>
        <div class="mb-3">
            <label for="lpw" class="form-label">パスワード</label>
            <input type="password" class="form-control" id="lpw" name="lpw" aria-describedby="lpwHelp">
        </div>
        <div class="mb-3">
            <label for="kanri_flg" class="form-label">権限</label>
            一般<input type="radio" name="kanri_flg" value="0">　
            管理者<input type="radio" name="kanri_flg" value="1">
        </div>
        <button type="submit" class="btn btn-primary">送信</button>
        </form>
    </div>
</body>
</html>
