<!doctype html>
<?php
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    try {
        
        $db = new PDO('mysql:host=localhost;dbname=portfolio', 'root');
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        
        $sql = 'select count(*) from users where username=? and password=?';
        $stmt = $db->prepare($sql);
        $stmt->execute(array($username, $password));
        $result = $stmt->fetch();
        $stmt = null;
        $db = null;
        
        
        
       
        if (!empty($result[0])&& intval($result[0])!=0) {
            header('Location: http://localhost/portfolio01/top.html');
        //'Location: http://localhost/PhpProject3/login/home.php
        exit;    
    }else {
            $err_msg="ユーザー名又はパスワードが誤りです。";
        }
    
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
}
?>
<html>

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <title>ログイン画面</title>
    </head>
    <body>
        <h1>
            ログイン画面
        </h1>
        <form action="" method="POST">
           <?php if (!empty($err_msg)){echo $err_msg."<br>";}?>
            ユーザー名<input type="text" name="username" value=""><br>
            パスワード<input type="password" name="password" value=""><br> 
            <input type="submit" name="login" value="ログイン">
        </form>
        <style>
            .example{
                text-align: center;
            }         
        </style>
        <div class="example">
        <a href="signin.php">新規登録</a>
        </div>
    </body>
</html>




