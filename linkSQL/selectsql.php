<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SQL manipulation</title>
</head>
<body>
  <?php
      // mysqlに接続するモジュールでmysqlオブジェクトをつくる mampではweb_start_pageのtopページにある
      $db = new mysqli('localhost:8889', 'root', 'root', 'mydb');
      // query(); でＳＱＬ構文をかく
      $songs_records = $db->query('select * from songs');
      // var_dump(); で取得できているか確認
      // var_dump($songs);

      if ($songs_records) {
        echo 'SONG 一覧' . '<br>';
        while ($record = $songs_records -> fetch_assoc()) {
        echo $record['song_name'] . '<br>';
        }
      }

      // songs table1のデータの数を変数にする
      $songs_cnt = $db -> query('select count(*) from songs');
      // var_dump($songs_cnt);
      if ($songs_cnt){
        while ($song_cnt = $songs_cnt -> fetch_assoc()) {
          echo $song_cnt['count(*)'] . '<br>';
        } 
      } else {
        echo $db -> error;
      }
    
    // // MYSQL への書き込み
    // $book_title = '浅倉樹々写真集『cherie』';
    // // prepare
    // $add_book = $db -> prepare('insert into books(title) value(?)');
    // // bind_param('文字列s 数字 i 等')
    // $add_book -> bind_param('s', $book_title);
    // $ret = $add_book -> execute();
    // if ($ret):
    //   echo '成功';
    // else:
    //   echo $db -> error;
    // endif;
  ?>
  <form action="input_do.php" method="post">

  </form>