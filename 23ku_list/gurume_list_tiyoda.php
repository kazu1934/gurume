<?php

try
{

$dsn='mysql:dbname=portfolio;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT * FROM nikki where ku="千代田区"';
$stmt=$dbh->prepare($sql);
$stmt->execute();

$dbh=null;


$list=[];
$num=0;
while(true)
{
	$rec=$stmt->fetch(PDO::FETCH_ASSOC);
	if($rec==false)
	{
		break;
	}
        $gurume['name']=$rec['name'];
        $gurume['genre']=$rec['genre'];
        $gurume['ranku']=$rec['ranku'];
        $gurume['comment']=$rec['comment'];
        $gurume['address']=$rec['address'];
        $gurume['gazou']=$rec['gazou'];
        $gurume['date']=$rec['date'];
        
      $list[$num]=$gurume;
      $num++;
        
        
        
        
	
}

}
catch (Exception $e)
{
	 print 'ただいま障害により大変ご迷惑をお掛けしております。';
	 exit();
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title> ろくまる農園</title>
<link rel="stylesheet" href="../style.css">
</head>
<body>
    <table border="1"><!-- 練習 -->
            <caption>お気に入り店一覧</caption>
            <thead><tr><th>店名</th><th>ジャンル</th><th>ランク</th><th>コメント</th><th>アドレス</th><th>画像</th><th>日時</th></tr></thead>
            <?php
            // テーブルデータを1行ずつ表示
            foreach ($list as $gurume) 
                
            {
                // YYYY/MM/DD 曜日 HH:mm:ss　の形式に連結する
               // $date = "${gurume['date']} ${weekdays[$rec['weekday']]} ${gurume['time']}";
                ?>
                <tr>
                    <td><?= htmlspecialchars($gurume['name']) ?></td>
                    <td><?= htmlspecialchars($gurume['genre']) ?></td>
                    <td><?= htmlspecialchars($gurume['ranku']) ?></td>
                    <td><?= nl2br(htmlspecialchars($gurume['comment']), false) ?></td>
                    
                    <td><?= nl2br(htmlspecialchars($gurume['address']), false) ?></td>
                    <td> <?php if (!empty($gurume['gazou'])): ?>
    <img src="../photo/<?= htmlspecialchars($gurume['gazou']);?>" alt="グルメ画像"/>
    <?php endif; ?>
</td>

                    <td><?= htmlspecialchars($gurume['date']) ?></td>
                    
                </tr>
                <?php
            }
            ?>
    </table><!<!-- 練習 -->
    

    <a href="../top.html">戻る </a>
        
</body>
</html>



