<?php 
  session_start();
  
  $dsn = 'mysql:dbname=cebty;host=localhost';
  $user = 'root';
  $password = '';
  $dbh = new PDO($dsn, $user, $password);
  $dbh->query('SET NAMES utf8');


      $sql = 'INSERT INTO `cebty_items` SET `user_id`=?,
                                            `item_name`=?,
                                            `itempic_path`=?,
                                            `itempic_path2`=?,
                                            `itempic_path3`=?,
                                            `price`=?,
                                            `category`=?
                                            `limited_date`=?,
                                            `item_detail`=?,
                                            `dealing_area`=?,
                                            `daling_date`=?,
                                            `created`=NOW()
                                            ';

 

    $data=array($_SESSION['login']['id'],$_POST['item_name'],$_POST['itempic_path'],$_POST['itempic_path2'],$_POST['itempic_path3'],$_POST['price'],$_POST['category'],$_POST['limited_date'],$_POST['item_detail'],$_POST['dealing_area'],$_POST['daling_date'] );
    $stmt=$dbh->prepare($sql);
    $stmt->execute($data);
    

    $errors = array();
    if('item_name' == ''){
      $errors ['item_name'] = 'blank';
    }

    if('price' == ''){
      $errors ['price'] = 'blank';
    }

    if('category' == ''){
      $errors ['category'] = 'blank';
    }

    if('limited_date' == ''){
      $errors ['limited_date'] = 'blank';
    }

    if('item_detail' == ''){
      $errors ['item_detail'] = 'blank';
    }

    if('dealing_area' == ''){
      $errors ['dealing_area'] = 'blank';
    }

    if('daling_date' == ''){
      $errors ['daling_date'] = 'blank';
    }

    // $fileName = $_FILES['itempic_path']['name'];
    // if(!empty($fileName)){
    //   $ext=substr($fileName,-3);
    //   $ext=strtolower($ext);
    //   echo '拡張子は'.$ext.'<br>';
    //   if ($ext !='jpg' && $ext != 'png' && $ext != 'gif'){
    //     $errors['itempic_path']='extension';
    //   }
    //   }else{
    //   $errors['profile_image_path'] = 'blank';
    // }
    // if (empty($errors)) {
    //   move_uploaded_file($_FILES['itempic_path']['tmp_name'] , '../itempic_path/'.$fileName);
    // exit();
    // }
  

?>

 <!DOCTYPE html>
 <html lang="ja">
 <head>
  <meta charset="utf-8">
   <title>出品画面</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/puroduct_putup.css">
 </head>
 <body>
  <form method="POST" action="" enctype="multipart/form-data">

    <h1>商品情報 登録画面</h1>

    <label>商品画像</label><br>
    <!-- 商品画像１ -->
      <input type="file" name="itempic_path" accept="image/*">
        <?php if(isset($errors['itempic_path']) && $errors['itempic_path'] == 'extension') { ?>
          <div class="alert alert-danger">
          使用できる拡張子はjpgまたはpngまたはgifのみです。
          </div>
        <?php } ?>
        <br>
    <!-- 商品画像２ -->
      <input type="file" name="itempic_path2" accept="image/*">
        <?php if(isset($errors['itempic_path2']) && $errors['itempic_path2'] == 'extension') { ?>
          <div class="alert alert-danger">
          使用できる拡張子はjpgまたはpngまたはgifのみです。
          </div>
        <?php } ?>
        <br>
    <!-- 商品画像３ -->
      <input type="file" name="itempic_path3" accept="image/*">
        <?php if(isset($errors['itempic_path3']) && $errors['itempic_path3'] == 'extension') { ?>
          <div class="alert alert-danger">
          使用できる拡張子はjpgまたはpngまたはgifのみです。
          </div>
        <?php } ?>
        <br>
      
    <label>題名</label><br>
      <input type="text" name="item_name" action placeholder="例:冷蔵庫　1000ペソ" value=""><br>
        <?php if (isset($errors['item_name'])) { ?>
          <div class="alert alert-danger">
              題名を入力してください
  　       </div>
        <?php  } ?> 
      
    <label>価格</label><br>
      <input type="text" name="price" action placeholder="例:1000" value="">ペソ<br>
        <?php if (isset($errors['price'])) { ?>
          <div class="alert alert-danger">
              題名を入力してください
          </div>
        <?php  } ?> 

    <label>カテゴリ</label><br>
      <select name="category" size="1">
        <option value="家電">家電</option>
        <option value="衣服">衣服</option>
        <option value="食料品">食料品</option>
        <option value="薬">薬</option>
        <option value="その他">その他</option>
      </select><br>

          <label>掲載期限</label><br>
      <input type="text" name="limited_date" action placeholder="例:1000" value=""><br>
        <?php if (isset($errors['limited_date'])) { ?>
          <div class="alert alert-danger">
            掲載期限を入力してください
          </div>
        <?php  } ?> 

    <label>コメント</label><br>
      <textarea type="text" name="item_detail" action placeholder="商品の詳細や、取引について記入してください。" value=""></textarea><br>
        <?php if (isset($errors['item_detail'])) { ?>
          <div class="alert alert-danger">
            コメントを入力してください
          </div>
        <?php  } ?> 



      <label>エリア</label><br>
      <input type="text" name="dealing_area" action placeholder="例:1000" value=""><br>
        <?php if (isset($errors['dealing_area'])) { ?>
          <div class="alert alert-danger">
            エリアを入力してください
          </div>
        <?php  } ?> 

    <label>取引可能日</label><br>
      <input type="text" name="daling_date" action placeholder="例:1000" value=""><br>
        <?php if (isset($errors['daling_date'])) { ?>
          <div class="alert alert-danger">
            取引可能日を入力してください
          </div>
        <?php  } ?> 


          <br>
    <input type="submit" value="登録" >
  </form>
 </body>
 </html>