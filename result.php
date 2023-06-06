<?php

    //0. SESSION開始！！
    // session_start();

    //1. DB接続します
    include("funcs.php");

    //LOGINチェック → funcs.phpへ関数化しましょう！
    // if(!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()){
    //     exit("Login Error");
    // }else{
    //     session_regenerate_id(true);
    //     $_SESSION["chk_ssid"] = session_id();
    // }

    //２．データ登録SQL作成
    $pdo = db_conn();
    $sql = "SELECT * FROM gs_bm_table";
    $stmt = $pdo->prepare($sql);
    $status = $stmt->execute();

    //３．データ表示
    $values = "";
    if($status==false) {
        sql_error($stmt);
    }
    //全データ取得
    $values = $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
    $json = json_encode($values,JSON_UNESCAPED_UNICODE);

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <title>Word Vector Results</title>
</head>
<body class="bg-light">
    <div class="container my-5 bg-white p-5 rounded-3">
        <h1 class="mb-4">ブックマーク一覧・更新</h1>
        <table class="table table-light table-striped table-hover">
            <thead><tr><th>登録データ一覧</th><th></th><th></th><<th></th><th></th></tr></thead>
            <tbody>
                <?php foreach($values as $v){ ?>
                <tr>
                    <td><?=$v["id"]?></td>
                    <td><a href="detail.php?id=<?=$v["id"]?>"><?=h($v["name"])?></a></td>
                    <td><?=h($v["url"])?></td>
                    <td><?=h($v["comment"])?></td>
                    <td><?=$v["date"]?></td>
                    <td><a href="delete.php?id=<?=$v["id"]?>">[削除]</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="post.php" class="btn btn-primary mt-3">戻る</a>
    </div>
    <script>
        const a = '<?php echo $json; ?>';
        console.log(JSON.parse(a));
    </script>
</body>
</html>