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
    <link rel="stylesheet" href="style.css">
    <title>pet-shop</title>
</head>
<body>
    <h2 class="title">本日のご紹介ペット!</h2>
    <ul class="pet-lis">
        <?php foreach ($animals as $animal): ?>
            <li>
                <?= h($animal['type']) . 'の' . h($animal['classification']) . 'ちゃん' .
                    '<br>' . h($animal['description'] ) . '<br>' . 
                    h($animal['birthday']) . ' ' . '生まれ'. '<br> ' .
                    '出身地' . ' ' . h($animal['birthplace'])?>
            </li>
            <hr>
        <?php endforeach; ?>
    </ul>
</body>
</html>