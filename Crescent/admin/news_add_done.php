<?php

declare(strict_types=1);
session_start();
require_once dirname(__FILE__) . '/auth.inc.php';
authConfirm();

require_once dirname(__FILE__) . '/../util.inc.php';
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>お知らせ追加完了 | Crescent Shoes 管理</title>
    <link rel="stylesheet" href="css/admin.css">
</head>

<body>
    <header>
        <div class="inner">
            <span><a href="index.php">Crescent Shoes 管理</a></span>
            <?php include dirname(__FILE__) . '/account.parts.php'; ?>
        </div>
    </header>
    <div id="container">
        <main>
            <h1>お知らせの追加</h1>
            <p>お知らせの追加が完了しました。</p>
            <p><a href="index.php">お知らせ一覧へ戻る</a></p>
        </main>
        <footer>
            <p>&copy; Crescent Shoes All rights reserved.</p>
        </footer>
    </div>
</body>

</html>
