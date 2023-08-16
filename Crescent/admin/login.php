<?php declare(strict_types=1);
session_start();

require_once(dirname(__FILE__) . '/../util.inc.php');
require_once(dirname(__FILE__) . '/../Models/Auth.php');

$login_id    = '';
$login_pass  = '';
$isValidated = false;
if (!empty($_POST)) {
    $login_id    = $_POST['login_id'];
    $login_pass  = $_POST['login_pass'];
    $isValidated = true;

    if ($login_id === '' || preg_match('/^(\s|　)+$/u', $login_id)) {
        $login_idError = 'ログインIDを入力してください。';
        $isValidated = false;
    }

    if ($login_pass === '' || preg_match('/^(\s|　)+$/u', $login_pass)) {
        $login_passError = 'パスワードを入力してください。';
        $isValidated = false;
    }

    if ($isValidated === true && (new Auth())->login($login_id, $login_pass)) {
        session_regenerate_id(true);
        $_SESSION['login_id']      = $login_id;
        $_SESSION['authenticated'] = true;
        header('Location: index.php');
        exit;
    } else {
        $verifyError = 'ログインIDまたはパスワードに誤りがあります。';
    }

}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ログイン | Crescent Shoes 管理</title>
    <link rel="stylesheet" href="css/admin.css">
</head>

<body>
<meta charset="UTF-8">
    <title>ログイン | Crescent Shoes 管理</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/admin.css">
    <style>
        header {
            height: 40px;
        }

        h1 {
            font-weight: bold;
        }

        ul.pagination {
            justify-content: flex-end;
            margin-top: -50px;
        }
    </style>
</head>

<body>
    <header>
        <div class="inner">
            <span><a href="index.php">Crescent Shoes 管理</a></span>
        </div>
    </header>
    <div id="container">
        <main>
            <form action="" method="post" class="form-signin d-b mt-5 mx-auto" style="width:400px" novalidate>
                <div class="card-deck text-center">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">
                                <img src="../images/logo01.png" width="100">
                            </h4>
                        </div>
                        <div class="card-body">
                            <?php if (isset($verifyError)) : ?><p class="error alert alert-danger"><?= $verifyError ?></p><?php endif; ?>
                            <?php if (isset($login_idError)) : ?><p class="error alert alert-danger"><?= $login_idError ?></p><?php endif; ?>
                            <div class="input-group mb-3">
                                <label class="input-group-text">
                                    ログインID
                                </label>
                                <input type="text" name="login_id" value="<?= h($login_id) ?>" class="form-control" autofocus>
                            </div>
                            <?php if (isset($login_passError)) : ?><p class="error alert alert-danger"><?= $login_passError ?></p><?php endif; ?>
                            <div class="input-group mb-3">
                                <label class="input-group-text">
                                    パスワード
                                </label>
                                <input type="password" name="login_pass" class="form-control" value="<?= h($login_pass) ?>">
                            </div>
                            <div class="d-grid">
                                <input class="btn btn-lg btn-primary" type="submit" name="login" value="ログイン">
                            </div>
                            <div class="mt-3">※ログインID・パスワードの登録は<a href="asign.php">こちら</a></div>
                        </div>
                    </div>
                </div>
            </form>
        </main>
        <footer>
            <p class="text-center">&copy; Crescent Shoes All rights reserved.</p>
        </footer>
    </div>
</body>

</html>
