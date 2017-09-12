<?php

    // 関数について
    // 自作関数（ユーザー定義関数）
    // 組み込み関数
    // 例：strlen() , count() , empty()
    
    //自作関数の定義の仕方
    // function 関数名(){
    //   処理を記載
    // }

    // 自作関数の使用方法
    // 関数名(引数);
    // 例：hogehoge($hoge);

    function helloWorld(){
       echo 'helloWorld';
       echo '<br>';
    }

    // 引数が複数ある計算の関数
    function ownPlus($num1, $num2, $num3){
        $result = $num1 * $num2 *  $num3;
        echo $result;
        echo '<br>';
    }
    function ownScore($score=0){
        if($score == 0){
            echo 'ママ：ののび太ぁぁぁぁぁ！！！';
        }elseif($score <50){
            echo 'スネ夫：のび太のくせに!!';
        }elseif($score>50){
            echo 'どらえもん：よく頑張ったねえ';
        }
        echo '<br>';
        echo $score . '得点';
        echo '<br>';
    }
        // 返り値（戻り値）がある関数
    // 戻り値があることによってそのあとの計算もその関数ででた数字を使用することができる。
    function ownPlusReturn($num1, $num2, $num3){
        $result = $num1 * $num2 *  $num3;
       return $result;
   }

   function ownRand1_100(){
        $value = rand(1,100);
        return $value;
   }
 ?>
