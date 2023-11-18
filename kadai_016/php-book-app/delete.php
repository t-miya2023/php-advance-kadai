<?php  
    $dsn = 'mysql:dbname=php_db_book_app;host=localhost;charset=utf8mb4';
    $user = 'root';
    $pass = '';

    try{
        $pdo = new PDO($dsn,$user,$pass);

        $sql_delete = 'DELETE FROM books WHERE id = :id';

        $stmt_delete = $pdo->prepare($sql_delete);

        $stmt_delete->bindValue(':id',$_GET['id'],PDO::PARAM_INT);

        $stmt_delete->execute();

        $count = $stmt_delete->rowCount();
            $message = "商品を{$count}件削除しました。";
            header("Location:read.php?message={$message}");
    }catch(PDOException $e){
        exit($e->getMessage());
    }
?>