<?php
if (isset($_POST['signin'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    try {
        $db=new PDO('mysql:host=localhost;dbname=portfolio','root');
        $sql='insert into users(username,password)values(?,?)';
        $stmt=$db->prepare($sql);
        $stmt->execute(array($username,$password));
        $stmt=null;
        $db=null;
        
        header('Location: http://localhost/PhpProject3/login/index.php');
        exit;
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
        <title>新規登録画面</title>
    </head>
    <body>
        <h1>
            新規登録画面
        </h1>
        <form action="" method="POST">
            ユーザー名<input type="text" name="username" value=""><br>
            パスワード<input type="password" name="password" value=""><br> 
            <input type="submit" name="signin" value="新規登録">
        </form>
       
    </body>
</html>
<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */



/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */


