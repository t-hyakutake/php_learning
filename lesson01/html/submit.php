<?php 
  session_start();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php if (!empty($_REQUEST['my_name'])) { ?>
  <p>submitで送信された名前は
     <?php echo htmlspecialchars($_POST['my_name'], ENT_QUOTES ); ?> 
    <!-- []の中はテキストで入力されたinputタグの name""属性 で紐づける -->
    <br>
    htmlspecialchars( 受け取り , ENT_QUOTES) で囲むとscriptタグを文字列にできるので不正な操作を防げる $_REQUEST等の外部入力を表示させる時はこの処理はセキュリティ上必須
  </p>
<?php
} else {
  echo 'お名前を入力してください';
}
?>
<h2>推しのメンバーは</h2>
<?php if (!empty($_REQUEST['like_member'])) {
    $members = $_REQUEST['like_member']; ?>
     <ul>
         <?php foreach ($members as $like_member){ ?>
           <li><?php echo htmlspecialchars($like_member, ENT_QUOTES); ?></li>
         <?php }; ?>
         <!-- チェックボックスは配列で受け取るので処理して表示 -->
     </ul>
     <?php
  } else {
    echo '推しを選んでください';
} ?>
<br>

<p>あなたの好きな数字は
  
  <?php
    if (!empty($_REQUEST['like_number'])) {
   $like_number = $_REQUEST['like_number'];
   $like_number = mb_convert_kana($like_number, 'n', 'UTF-8');
   echo htmlspecialchars( $like_number, ENT_QUOTES);
  //  echo ($_POST['like_number'], ENT_QUOTES);  
  ?>
 ですね</p> 
  <?php
    } else {
      echo '好きな数字も入力ください';
    }
  ?>

  <?php 
    $post_number = $_POST['post_number'];
    if (preg_match("/\A\d{7}\z/", $post_number)) {
     // 7桁の数字だったらtrue
  ?>
      <p>郵便番号は<?php echo $post_number; ?></p>
  <?php
    } else {
      echo '違うよ♡7桁の半角数字でお願いします';
    }
  ?>

  <br><br>
  POSTを$_REQUESTで受け取ると、urlに追加でデータを改ざんできるので、POSTはPOSTで受けとる。<br>

<h3>cookieの値表示</h3>
変数の値: <?php echo $value; ?><br>
cookieの値: <?php echo $_COOKIE['message']; ?>

  
<h3>sessionの値表示</h3>
sessionの値: <?php echo $_SESSION['session_message']; ?>
<br>
<br>
<p>fileを受け取る時の連想配列</p>
<?php
  // $_FILES['form inputのname="ここ"'] name属性の値をかく
  $file = $_FILES['picture'];
  var_dump($file);
  // var_dump(); で変数の内容を確認できる
  // array(5) { 
  //   ["name"]=> string(16) "illustration.jpg" 
  //   ["type"]=> string(10) "image/jpeg" 
  //   ["tmp_name"]=> string(44) "C:\Users\user\AppData\Local\Temp\php954E.tmp" 
  //   ["error"]=> int(0) 
  //   ["size"]=> int(3104503) 
  // } 
  // という連想配列で受け取っている
  echo '<br>';

  // if 文で.jpg と.pngのみ受け取る
  if ($file['type'] === 'image/jpeg' || $file['type'] === 'image/png') {
    // imageを保存する場所を指定、同層のimagesフォルダに
    $pathImage = 'images/' . $file['name'];
    // move_uploaded_file(fileの場所, fileのname) var_dump内の連想配列を参照
    $successUpload = move_uploaded_file($file['tmp_name'], $pathImage);
    if ($successUpload) {
      echo "アップロード成功";
    } else {
      echo 'アップロード失敗';
    };
  } else {
    echo 'jpeg形式の画像fileのみアップロードください';
  };
?>  
<br>
<a href="http://localhost:8888/lesson01/sample01.php">戻る</a>
</body>
</html>