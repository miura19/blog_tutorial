<?php

function dbConnect(){
    $dsn = "mysql:host=localhost;dbname=blog_app;charaset=utf8";
    $user = 'root';
    $pass = '';
    try{
        $dbh = new PDO($dsn,$user,$pass,[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);
    } catch(PDOException $e){
        echo '接続失敗'. $e->getMessage();
        exit();
    }
    return $dbh;
}

function getAllBlog(){
    $dbh = dbConnect();
    //sqlの準備
    $sql = 'select * from blog';
    //sqlの実行
    $stmt = $dbh->query($sql);
    //sqlの結果を受け取る
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
    $dbh = null;
}


function setCategoryName($category){
    if ($category === '1'){
        return 'ブログ';
    } elseif ($category === '2'){
        return '日常';
    } else {
        return 'その他';
    }
}

function getBlog($id){
    if (empty($id)){
        exit('IDが不正です!!!!!');
    }
    
    $dbh = dbConnect();
    $stmt = $dbh->prepare('select * from blog where id = :id');
    $stmt->bindValue(':id',(int)$id,PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$result){
        exit('ブログがないやで。');
    }

    return $result;
}

?>