<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h2>PHPコンテンツ</h2>
  <?php

  echo '初PHP';
  echo 'I\'m ironman'; //
  echo "<br>";
  echo 2 + 3 - 1; // 4
  echo '<br>';
  echo 2*5/4; // くっつけてもOK
  echo '<br>';
  echo date(' G時 i分 s秒'); // G時間(24一桁) i分 s秒 標準時間
  echo '<br>';
  date_default_timezone_set('Asia/Tokyo');
  echo date(' G時 i分 s秒'); // 日本時間
  print '今の時間は'. date(' G時 i分 s秒'). 'です'; // .（ピリオド）で文字列連結 echoはでも可能
  echo '<br>';
  //オブジェクト
  $today = new DateTime();
  $today -> setTimezone(new DateTimeZone('Asia/Tokyo'));
  echo '現在は' . $today -> format('G時 i分 s秒');
  echo '<br>';
  echo '変数';
  $sum = 500 + 500;
  echo '<br>';
  echo '文字列連結で変数は' . $sum;
  ?>
  <p>htmlのpタグで<?php echo $sum; ?>はさみました</p>
  <?php
   echo 'while文';
   echo '<br>';
   $i = 1; 
   $i += 1;
   echo $i .  '<br>'; // 2

   // while文でループ操作
   while ($i < 10): //trueで実行
    echo $i . '<br>'; // 2 4 6 8
    $i += 2;
   endwhile;

   $i = 1;
   while ($i < 16) {
    echo $i . '<br>';
    $i += 3;
   };
   // js と同じ構文でかける
   
   // for文でループ操作
   echo 'for文' . '<br>';
   for ($i = 0; $i <= 5; $i++ ): // 区切りは;セミコロン コロンを忘れずに　でもかける？
    echo $i;
   endfor;
   echo '<br>';

   // date 日時
   $day = date('y/n/j/(D)');
   echo $day; //今日
   echo '<br>';

   // strtotime でdate取得
   $time = strtotime('+1 day');
   
   echo '<br>';
   echo '+1 ' . $time;
   $nextDay = date('y/n/j/(D)' , $time );
   echo $nextDay;
   echo '<br>';
   echo 'chatGTP';
   $chattime = strtotime('tomorrow');
echo '<br>';
$beforeDay = date('y/m/d (D)', $chattime);
echo $beforeDay;
echo '<br>';

echo 'now' . strtotime("now"), "\n";
echo '日付指定' . strtotime("10 September 2000"), "\n";
echo '+1day' . strtotime("+1 day"), "\n";
echo '+1week' . strtotime("+1 week"), "\n";
echo '+etc' . strtotime("+1 week 2 days 4 hours 2 seconds"), "\n";
echo '+nextThursday' . strtotime("next Thursday"), "\n";
echo '先週のMonday' . strtotime("last Monday"), "\n";
echo '<br>';

//先週の日曜を strtotimeでとって、dateで表示 
 $lastMondayTime = strtotime("last Monday");
 $lastMonday = date('y/m/d (D)', $lastMondayTime);
 echo '先週の日曜' . $lastMonday;

// date を使ったカレンダー
for ($i = 0; $i < 8; $i++):
  // $carenderTime = strtotime('+7' . $i . 'day'); // 文字列はしっかり''で囲む
  $carenderTime = strtotime("+7 $i day"); // ""で囲むと変数$iを変数として代入できる
  $day = date('n/j/(D)', $carenderTime);
  echo $day . '<br>';
endfor;
echo '<br>';
// 配列
// 曜日を日本語でとる方法
// 曜日表示はメソッドにないので配列を作る
$week_name = ['日曜', '月曜', '火曜', '水曜', '木曜', '金曜', '土曜'];
// echo $week_name[1]; // 月曜
$week = date('w'); // date('w') は曜日をnumberで取得できる 0が日曜
echo "今日は$week_name[$week]"; // wでとったnumberを配列のインデックに充てる

// 連想配列
$players_skill = [
  'Ootani' => '2刀流',
  'darubissyu' => 'pitch',
  '福本' => 'steal'
];
?>
 <!-- htmlのdlタグと併せる -->
<dl>
<h4>htmlとPHPのくみあわせ</h4>
  <?php  foreach ($players_skill as $player_name => $skills): ?>
    <!-- foreach (配列の関数 as key => 値) -->
    <dt>
       <?php echo $player_name; ?>  
       <!-- 連想配列のkeyを表示 -->
    </dt> 
    <dd>
       <?php echo $skills; ?> 
       <!-- 連想配列の値を表示 -->
    </dd> 
  <?php endforeach; ?>
</dl>

<h3>if構文</h3>
<?php
 $string = ''; //  ''の間にstringがあるかないかを判断する
 if ($string === ''): // stringがnullの時
   echo '文字なし';
   else: // :コロンを忘れずに
   echo '文字あり';
 endif;
?>
<h3>ceil,floor,round</h3>
<?php
echo ceil(3.66) . '<br>'; // 切り上げ
echo floor(3.66) . '<br>'; // 切り捨て
echo floor(3.66666) . '<br>'; // 四捨五入
echo round(3.66666, 1) . '<br>'; // 四捨五入 小数点1位
echo round(3.66666, 3) . '<br>'; // 四捨五入 小数点2位
?>
<h3>sprint</h3>
<?php
  $year = 2023;
  $month = 2;
  $day = 14;
  $date = sprintf('%4d年%02d %02d', $year,$month, $day ); // %でnumをstringにしている
  echo $date . '<br>';
  echo gettype($date);
?>
<h3>ファイルへの書き込み</h3>
<p>file_put_contents();</p>
<?php 
 $make_file = file_put_contents('data/news.txt', 'ファイル中のテキストです');
 // 同じ階層の'data'ディレクトリに中身が'ファイル中の～'の'news.txt'という名前のファイルを作る
 if ($make_file !== false) {
  // === true だと駄目です。ファイル作成失敗の時はfalseを返すが、成功の時は成功なだけでtrueを返している訳ではない  
  echo 'ファイル作成完了';
 } else {
  echo 'ファイル作成エラー';
  // ディレクトリがないなど、ファイルが作れない時は'false'を返すので、else を実行
 }
?>
<h3>ファイルの読み込み</h3>
<?php
 // readfile('addDir/addwright.txt'); // 読み込んで表示する 
 
 // 以下 読み込んで→追記して→表示
  $addtxt = file_get_contents('addDir/addwright.txt');
     // 既に存在するファイルを読み込む
  // $addtxt = $addtxt . "<br>読み込んだファイルを文字連結で追記しました"; // これだとリロードの度に追加していく
  $addtxt = "<br>読み込んだファイルを文字連結で追記しました";
  file_put_contents('addDir/addwright.txt' , $addtxt);
     // 追記内容は変数にしてあてることができる
  echo $addtxt;
 ?>
<h3>xmlファイルの読み込み</h3>
<?php
$xmlFile = simplexml_load_file('tomosta.jp.txt');
echo $xmlFile -> channel -> title; // file内のchannnelタグのtitleタグをecho
echo '<br>';
foreach ($xmlFile->channel->item as $item) {
    // fileのchannelタグのitemタグを順番に取り出し、変数に入れる
    ?>
    <a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a><br>
    <?php
}
?>
<h3>json の読み込み</h3>
<p>json_decode();</p><br>
<p>json 形式のデータを配列に変更する</p>
<?php
  $file = file_get_contents('feed.json'); //ディレクトリ内のfileを読み込み、変数に入れる
  $json = json_decode($file); //json形式のfileを配列にしている
  foreach($json -> items as $jsonItems) {
    ?>
    <ul>
      <li>
        <a href="<?php echo $jsonItems -> url; ?>">
          <?php echo $jsonItems -> title; ?>
        </a>
     </li>
   </ul>
    <?php
  }
?>
<h4>jsonの書き込み</h4>
<?php
  $morning_json = [
      "name" => "morning",
      "menber" => [
        "譜久村", "生田", "石田"
      ]
  ];
  $json = json_encode($morning_json, JSON_UNESCAPED_UNICODE); //JASON=UNISCAPED_UNICODE は日本語文字表記のままにする
  echo $json;
?>
<h3>formからの受け取り</h3>
<p>json_decode() はJSON形式の文字列に変換</p>
<?php
  file_put_contents('data/morning-json', $json); //作ったjsonをfileで作る
?>
 <form action="html/submit.php" method="post" enctype="multipart/form-data">
  <!-- enctype="multipart/form-data"で画像をアップロードできるようにする。これがないとテキストしか送れない -->
  <!-- action属性は送信先のfile -->
    <label for="my_name">お名前：</label>
    <!-- for と id 属性を紐づければlabelをclickした時にinputが反応する -->
    <input type="text" id="my_name" name="my_name">
    <!-- name"" の中身で受け取るPHPで紐づける -->
    <h5>推しのメンバー</h5>
    <ul>
        <li>
          <label>
          <!-- label タグで囲むとテキストclickでチェックできる for="" も書かない -->
            <input type="checkbox" name="like_member[]" value="譜久村">譜久村
          </label>
        </li>
        <li>
          <label>
            <input type="checkbox" name="like_member[]" value="竹内">竹内
          </label>
        </li>
        <li>
          <label>
            <input type="checkbox" name="like_member[]" value="植村">植村
          </label>
        </li>
      </ul>
      <h5>好きな数字を入力してください</h5>
      <p>全角の数字も半角に処理します</p>
      <label for="like_number">好きな数字は</label>
      <input type="text" id="like_number" name="like_number">
      <h5>正規表現</h5>
      <p>半角数字で郵便番号を入力ください</p>
      <p>7桁かつ ハイフンなしで入力ください</p>
      <label for="post_number">〒</label>
      <br>
      <input type="text" id="post_number" name="post_number">
      <h5>画像のpost</h5>
        <label for="">画像：<input type="file" name="picture" ></label>
        <!-- type="file"でいろんなfileを送れる、nameで送信先と紐づける -->
      <br>
        <input type="submit" value="submit">
        <!-- valueの初期値は"送信" -->
  </form>
  <h4>formメソッドの get post の使い訳</h4>
  <ul>
    <li>getはurlに反映され操作しやすいのでセキュリティ面を考慮し。PWや長文を避ける</li>
    <li>get - name 等の短文stringに使う</li>
    <li>post - PW や長文 等がおすすめ</li>
    <li>受け取る場合は $_REQUEST をget post 両方の」送信に使えるが、postの送信を受けるとURLの加工でセキュリティ面で悪い urlに出る</li>
    <li>POST送信 は POST で受けるが基本</li>
    <li>GET送信 は REQUEST でも可能だが、GETで受けるが望ましい</li>
  </ul>

  <h3>table for文</h3>

<table border="1">
  <?php for ($i = 1; $i <= 10; $i++) { 
    if ($i % 3 === 1 ) { ?>
    <!-- ３の倍数＋１に指定できる -->
      <tr style="background: #eee">
      <?php
    } else {
      ?>
      <tr></tr>
      <?php
    } ?>
      <td><?php echo $i ?> 行目</td>
      <td>コンテンツ</td>
      </tr>
   <?php 
  } ?>
</table>

  <h3>リダイレクト</h3>
  <p>header();</p>
  <p>exit();</p>
  <?php
  // header('Location: https://gotenbaoracle.com');
  // exit();
  // 指定のurlにリダイレクトする
  ?>
  <h3>cookie</h3>
  <?php
  $value = '変数の値';
  // 変数は他のページに引き継げない
  setcookie('message' ,'cookievalue', time() + 60);
  // cookieとして他のページで利用できる。 timeはsec
  ?>
  <a href="html/submit.php">cookieの確認へ</a>
  <p>cookie注意事項</p>
  <ul>
    <li>パスワード等の大切な項目は使わない</li>
    <li>settimeは短めにするセキュリティ面</li>
    <li>ログインのname等に使う</li>
  </ul>
<h3>session</h3>
<p>ブラウザを消すと情報自体も消えるデータ</p>
<?php 
  session_start();

  session_regenerate_id();

  $_SESSION['session_message'] = 'sessionのvalueです';
?>

<h3>ランダム</h3>
<p>仮想サイコロランダムの数字を表示</p>
<?php
  $random = rand(1, 6);
  // 1から6の数字
  echo $random;
?>

<h3>関数の制作とファイルの呼び出し</h3>
<p>便利な関数はファイルにしてrequire()で呼び出す</p>

<?php
// function intax($value) { // 引数は関数の外の$priceと不一致だが、問題ないようである
  
//   $tax = 1.1;
//   return floor($value * $tax);
// }

// 上記の関数の入ったPHPファイルを呼び出す
require('intax.php');

$price = 1400;
$price_tax = intax($price);
//関数の引数と一緒にしなくていい
echo $price_tax;
?>
</body>
</html>


