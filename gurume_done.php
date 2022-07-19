<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>東京２３区グルメ日記</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
        try {
            $ku = $_POST['ku'];
            $name = $_POST['name'];
            $genre = $_POST['genre'];
            $ranku = $_POST['ranku'];
            $comment = $_POST['comment'];
            $address = $_POST['address'];
            $gazou = $_FILES['gazou'];
            $gazou_name=$gazou['name'];
            move_uploaded_file($gazou['tmp_name'], './photo/'.$gazou_name);
            //var_dump($gazou);
            //var_dump($ku);
            $dsn = 'mysql:dbname=portfolio;host=localhost;charset=utf8';
            $user = 'root';
            $password = '';
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = 'INSERT INTO nikki (ku,name,genre,ranku,comment,address,gazou) VALUES (?,?,?,?,?,?,?)';
            $stmt = $dbh->prepare($sql);
            $data[] = $ku;
            $data[] = $name;
           $data[] = $genre;
           $data[] = $ranku;
            $data[] = $comment;
            $data[] = $address;
            $data[] = $gazou_name;
                       
            $stmt->execute($data);

            $dbh = null;
            
            print"入力しました";
        } catch (Exception $e) {
            print"ただいま障害により大変ご迷惑をお掛けしております。";
            exit();
        }
        ?>
        <a href="top.html">戻る</a>
    </body>
</html>
