<?php 


session_start();
require('dbconnect.php');


    $sql = 'SELECT * FROM `cebty_items` WHERE `id`=?';
    $data = array($_GET['item_id']);
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);

    $item = $stmt->fetch(PDO::FETCH_ASSOC);



if(isset($_GET['item_id']) && isset($_GET['like'])){


      $sql = 'INSERT INTO `cebty_favorite` SET `user_id`=?,
                                              `items_id`=?,
                                              `item_name`=?,
                                              `price`=?,
                                              `dealing_date`=?,
                                              `itempic_path`=?';

      $data = array($_SESSION['login_user']['id'],$item['id'],$item['item_name'],$item['price'],$item['daling_date'],$item['itempc_path']);
      $stmt = $dbh->prepare($sql);
      $stmt->execute($data);

}elseif(isset($_GET['item_id']) && isset($_GET['unlike'])){


      $sql = 'DELETE FROM `cebty_favorite` WHERE `items_id`=?
                                              AND `user_id`=?';

      $data = array($_GET['item_id'],$_SESSION['login_user']['id']);
      $stmt = $dbh->prepare($sql);
      $stmt->execute($data);


}




header('Location: search.php#'.$item['id'].'?price='.$_GET['price'].'&area='.$_GET['area'].'&freeword='.$_GET['freeword']);

 ?>


<!-- search.phpにも色々書かないといけない
  -->