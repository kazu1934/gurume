<html>
    <head>
        <meta charset="UTF-8">
        <title>東京２３区グルメ日記</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
<?php
try {
 $dsn = 'mysql:dbname=portfolio;host=localhost;charset=utf8';
            $user = 'root';
            $password = '';
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    // 『名前|本文|日付|曜日(数値)|時間』 の形式で、時間で逆ソートして取得
    //$sql = "select name, msg, date_format(date,'%Y/%m/%d') as date, date_format(date, '%w') as weekday, time(date) as time from test_bbs2 order by timestamp(date) desc";
    //$sql = "select ku, name,comment,address,date, date_format(date,'%Y/%m/%d') as date, date_format(date, '%w') as weekday, time(date) as time from nikki order by timestamp(date) desc";
    $sql="select * from nikki ";
    $stmh = $pdo->query($sql);
    
} catch (PDOException $Exception) {
    die("エラー：" . $Exception->getMessage());
}
// 出力用の配列にとっておく
$all = $stmh->fetchAll(PDO::FETCH_ASSOC);
// 曜日日本語変換用
$weekdays = array('日', '月', '火', '水', '木', '金', '土');
// 切断
$pdo = null;
?>

<html>
    <head>
        <title>掲示板データ表示</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <table border="1">
            <caption>掲示板</caption>
            <thead><tr><th>店名</th><th>コメント</th><th>住所</th><th>日時</th></tr></thead>
            <?php
            // テーブルデータを1行ずつ表示
            foreach ($all as $row) {
                // YYYY/MM/DD 曜日 HH:mm:ss　の形式に連結する
                $date = "${row['date']} ${weekdays[$row['weekday']]} ${row['time']}";
                ?>
                <tr>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= nl2br(htmlspecialchars($row['comment']), false) ?></td>
                    <td><?= nl2br(htmlspecialchars($row['address']), false) ?></td>
                    <td><?= $date ?></td>
                </tr>
                <?php
            }
            ?>
        </table>

    </body>
</html>


