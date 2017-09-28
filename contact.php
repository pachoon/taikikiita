







<!DOCTYPE html>
<html lang="ja">
<head>
  <?php require('parts/assets.php') ?>
  <link rel="stylesheet" href="css/style.css">  
  <meta charset="utf-8">
  <title>お問い合わせ</title>
  <link href="css/contact.css" rel="stylesheet" />


    <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


</head>
<body>

  <?php require('parts/header.php'); ?>
  <div class="container">
    <div class="row">
    </div>
  </div>

<section id="contact">
      <div class="section-content" style="padding: 150px;">
        <h1 class="section-header">Get in <span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s"> Touch with us</span></h1>
        <h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h3>
      </div>
      <div class="contact-section">
      <div class="container">
        <form>
          <div class="col-md-6 form-line">
              <div class="form-group">
                <label for="exampleInputUsername">Your name</label>
                <input type="text" class="form-control" id="" placeholder=" Enter Name">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail">Email Address</label>
                <input type="email" class="form-control" id="exampleInputEmail" placeholder=" Enter Email id">
              </div>  
              <div class="form-group">
                <label for="telephone">Mobile No.</label>
                <input type="tel" class="form-control" id="telephone" placeholder=" Enter 10-digit mobile no.">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for ="description"> Message</label>
                <textarea  class="form-control" id="description" placeholder="Enter Your Message"></textarea>
              </div>
              <div>

                <button type="button" class="btn btn-default submit"><i class="fa fa-paper-plane" aria-hidden="true"></i>  Send Message</button>
              </div>
              
          </div>
        </form>
      </div>
    </section>






<!--   <h1 >お問い合わせ情報入力</h1>
  <form method="GET" action="check.php">
    <div>
        ニックネーム<br>
        <input type="text" name="nickname" style="width:100px">
    </div>
    <div>
        メールアドレス<br>
        <input type="text" name="email" style="width: 200px">
    </div>
    <div>
        お問い合わせ内容<br>
        <textarea name="content" cols="40" rows="5"></textarea>
    </div>
    <input type="submit" value="送信">
  </form>
</div> -->
</body>
</html>


