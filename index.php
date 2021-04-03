<?php

require_once __DIR__ . '/functions.php';

$dbh = conectDb();

$sql = 'SELECT * FROM animals';

$stmt = $dbh->prepare($sql);

$stmt->execute();

$animals = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pet-shop</title>
</head>
<body>
    <h2 style="padding-left: 37px;">本日のご紹介ペット!</h2>
    <ul>
        <?php foreach ($animals as $animal): ?>
        <li style="list-style-type:none;"><?= h($animal['type']) . 'の' . ($animal['classification']) . 'ちゃん' . '<br>' . ($animal['description'] ) . '<br>' . '出身地' . ($animal['birthplace']) . '<br> ' . ($animal['birthday']) . '生まれ'?></li>
        <hr>
        <?php endforeach; ?>
    </ul>
</body>
</html>