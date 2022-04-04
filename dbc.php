<?php

$dsn = "mysql:host=localhost;dbname=blog_app;charaset=utf8";
$user = 'root';
$pass = '';

try{
    $dbh = new PDO($dsn,$user,$pass,[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
    // echo '接続成功！';
    //sqlの準備
    $sql = 'select * from blog';
    //sqlの実行
    $stmt = $dbh->query($sql);
    //sqlの結果を受け取る
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // echo '<pre>';
    // print_r($result);
    // echo '</pre>';
    $dbh = null;
} catch(PDOException $e){
    echo '接続失敗'. $e->getMessage();
    exit;
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ブログ一覧</title>
</head>
<body>
    <h2>ブログ一覧</h2>
    <table>
        <tr>
            <th>No</th>
            <th>タイトル</th>
            <th>カテゴリ</th>
        </tr>
        <?php foreach($result as $column): ?>
        <tr>
            <td><?php echo $column['id']?></td>
            <td><?php echo $column['title']?></td>
            <td><?php echo $column['category']?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>