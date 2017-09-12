<?php 
  require('parts/functions.php')
 ?>

 <?php 
  helloWorld();
  helloWorld();
  helloWorld();
  helloWorld();
  helloWorld();
  helloWorld();
  helloWorld();
  helloWorld();

  $point=rand(0,100);
  $point1=rand(0,100);
  $point2=rand(0,100);
  ownPlus($point,$point1,$point2);

  $point=rand(0,100);
  ownScore($point);

  $value = ownPlusReturn(1,2,3);
  echo $value + 1;

  ?>