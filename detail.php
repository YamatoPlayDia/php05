<?php
    $id = $_GET["id"];
    //1. DB接続します
    include("funcs.php");
    $pdo = db_conn();
    //２．データ登録SQL作成
    $sql = "SELECT * FROM gs_bm_table WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);
    $status = $stmt->execute();
    //３．データ表示
    $values = "";
    if($status==false) {
        sql_error($stmt);
    }
    $v = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <title>ブックマーク変更</title>
</head>
<body class="bg-light">
    <div class="container my-5 bg-white p-5 rounded-3">
        <h1 class="mb-4">ブックマーク登録</h1>
        <form method="POST" action="update.php">
        <div class="mb-3">
            <label for="name" class="form-label">本の名前</label>
            <input type="text" class="form-control" id="name" name="name" value="<?=h($v["name"])?>" aria-describedby="nameHelp">
            <div id="nameHelp" class="form-text">例：動かして学ぶ! Laravel開発入門</div>
        </div>
        <div class="mb-3">
            <label for="url" class="form-label">URL</label>
            <input type="text" class="form-control" id="url" name="url" value="<?=h($v["url"])?>" aria-describedby="urlHelp">
            <div id="emailHelp" class="form-text">例：https://www.amazon.co.jp/</div>
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">コメント</label>
            <input type="text" class="form-control" id="comment" name="comment" value="<?=h($v["comment"])?>" aria-describedby="commentHelp">
            <div id="commentHelp" class="form-text">例：山崎校長の書籍です。そこそこのお値段がします。</div>
        </div>
        <button type="submit" class="btn btn-primary">送信</button>
        <input type="hidden" name="id" value="<?=$id?>">
        </form>
        <a href="result.php" class="btn btn-secondary mt-3">登録データ一覧に戻る</a>
    </div>
</body>
</html>
