<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>セブティー</title>
  <?php require('parts/assets.php') ?>
  <link rel="stylesheet" type="text/css" href="styles.css">
  
</head>
    
    <?php require('parts/header.php'); ?>
    <br>
    <div id="main-wrapper">
      <div class="title">
        <p class="title-title">セブティー</p>
        <p class="title-subtitle">～留学の「イラナイ」を「ホシイ」に～</p>
      </div>
     <div class="login">
        <span>ログイン</span>
        <div class="login-text">
          <input type="text" name="user_name" placeholder="ユーザー名" class="input-text">
          <input type="text" name="password" placeholder="パスワード" class="input-text">
        </div>
        <div class="login-button">
          <button class="btn btn-info" name="login"　type="submit">ログイン</button>
          <button name="sign_up" value="新規登録" class="btn btn-warning">新規登録</button>
        </div>
      </div>
      <div id="search">
           <select name="genre" class="search1">
            <option value="choose">選択</option>
            <option value="cloths">洋服</option>
            <option value="appliances">電化製品</option>
            <option value="goods">雑貨品</option>
            <option value="ohters">その他</option>
          </select>
          <input type="text" placeholder="キーワード" class="search2">
          <button type="submit" class="search3 btn btn-danger">検索</button>
      </div>
    </div>
    <div id="new-item-wrapper">
      <div class="new-item-title">
        <span>新着商品</span>
        <img src="assets/img/new.png" width="20px" height="20px">
      </div>
      <div class="container">
        <div class="row">
          <div class="product col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <img src="assets/img/01.jpg" width="220">
            <p><span>価格：</span><span>###</span></p>
            <p><span>引き取り可能日</span><span>###</span></p>
          </div>
           <div class="product col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <img src="assets/img/01.jpg" width="220">
            <p><span>価格：</span><span>###</span></p>
            <p><span>引き取り可能日</span><span>###</span></p>
          </div>
           <div class="product col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <img src="assets/img/01.jpg" width="220">
            <p><span>価格：</span><span>###</span></p>
            <p><span>引き取り可能日</span><span>###</span></p>
          </div>
        </div>
        <div class="row">
          <div class="product col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <img src="assets/img/01.jpg" width="220">
            <p><span>価格：</span><span>###</span></p>
            <p><span>引き取り可能日</span><span>###</span></p>
          </div>
           <div class="product col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <img src="assets/img/01.jpg" width="220">
            <p><span>価格：</span><span>###</span></p>
            <p><span>引き取り可能日</span><span>###</span></p>
          </div>
           <div class="product col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <img src="assets/img/01.jpg" width="220">
            <p><span>価格：</span><span>###</span></p>
            <p><span>引き取り可能日</span><span>###</span></p>
          </div>
        </div>
      </div>
    </div>
    　
    <?php require('parts/footer.php') ?>
<body>

</body>
</html>