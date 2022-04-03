<?php
$blog = $_POST;

if ($blog['publish_status'] === 'un_publish'){
    echo '公開中の記事がありません';
    return;
}


// if ($blog['publish_status'] === 'publish'){
//     foreach($blog as $key => $blogs){
//         echo '<pre>';
//         echo $key.':'.htmlspecialchars($blogs,ENT_QUOTES,'UTF-8');
//         echo '</pre>';
//     }
// } elseif ($blog['publish_status'] === 'un_publish'){
//     echo '公開中の記事がありません';
// } else {
//     echo '記事がありません';
// }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ブログ</title>
</head>
<body>
    <h2><?php echo htmlspecialchars($blog['title'],ENT_QUOTES,'UTF-8'); ?></h2>
    <p>投稿日：<?php echo htmlspecialchars($blog['post_at'],ENT_QUOTES,'UTF-8'); ?></p>
    <p>カテゴリ：<?php echo htmlspecialchars($blog['category'],ENT_QUOTES,'UTF-8'); ?></p>
    <hr>
    <p><?php echo nl2br(htmlspecialchars($blog['content'])); ?></p>
</body>
</html>