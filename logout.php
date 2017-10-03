<?php
    // ログアウトの仕組み
    // セッション情報を完全に破棄する
    // なぜなら、timeline.phpはセッションにidが存在するかどうかというif文で
    // ログイン状態かログインしてないかを判定している
    // ($_SESSION['user_login']['id']が存在するかどうかで)



// セッションの初期化
// session_name("something")を使用している場合は特にこれを忘れないように!
session_start();

// セッション変数を全て解除する
$_SESSION = array();

// セッションを切断するにはセッションクッキーも削除する。
// Note: セッション情報だけでなくセッションを破壊する。
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 最終的に、セッションを破壊する
session_destroy();

header('Location: index.php');
exit();


 ?>