<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>セブティー</title>
  <?php require('parts/assets.php') ?>
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
          <input type="button" name="login" value="ログイン" class="input-button-left">
          <input type="button" name="sign_up" value="新規登録" class="input-button-right">
        </div>
      </div>
      <div class="search">
        <select name="genre" class="search1">
          <optgroup label="選択">
          <option value="cloths">洋服</option>
          <option value="appliances">電化製品</option>
          <option　value="goods">雑貨品</option>
          <option　value="ohters">その他</option>
          </optgroup>
        </select>
        <input type="text" placeholder="キーワード" class="search2"><input type="submit" value="検索" class="search3">
      </div>
    </div>
    <div id="new-item-wrapper">
      <div class="new-item-title">
        <span>新着商品</span>
        <img src="assets/img/new.png" width="20px" height="20px">
      </div>
      <div　class="container products">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12 product">
            <img src="assets/img/01.jpg" width="220px">
            <p>
              <span>価格：</span>
              <span>###</span>
            </p>
            <p>
              <span>引き渡し可能日：</span>
              <span>###</span>
            </p>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 product">
            <img src="assets/img/01.jpg" width="220px">
            <p>
              <span>価格：</span>
              <span>###</span>
            </p>
            <p>
              <span>引き渡し可能日：</span>
              <span>###</span>
            </p>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 product">
            <img src="assets/img/01.jpg" width="220px">
            <p>
              <span>価格：</span>
              <span>###</span>
            </p>
            <p>
              <span>引き渡し可能日：</span>
              <span>###</span>
            </p>
          </div>
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12 product">
            <img src="assets/img/01.jpg" width="220px">
            <p>
              <span>価格：</span>
              <span>###</span>
            </p>
            <p>
              <span>引き渡し可能日：</span>
              <span>###</span>
            </p>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 product">
            <img src="assets/img/01.jpg" width="220px">
            <p>
              <span>価格：</span>
              <span>###</span>
            </p>
            <p>
              <span>引き渡し可能日：</span>
              <span>###</span>
            </p>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 product">
            <img src="assets/img/01.jpg" width="220px">
            <p>
              <span>価格：</span>
              <span>###</span>
            </p>
            <p>
              <span>引き渡し可能日：</span>
              <span>###</span>
            </p>
          </div>
        </div>
        </div>
      </div>
    </div>
    　
    <?php require('parts/footer.php') ?>
<body>

</body>
</html>