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
      // mysqlに接続するモジュールでmysqlオブジェクトをつくる
      $db = new mysqli('localhost:8889', 'root', 'root', 'mydb');
      // books tablが存在したら、dropでけす
      $db->query('drop table if exists books');
      // table をつくる 
      $create_table = $db -> query('create table books(id INT, title TEXT)');
      // query(); は失敗すると false  を返すのでif文で
      if ($create_table) {
        echo 'table作成成功';
      } else {
        echo 'table 作成失敗';
      };
      
    ?>
    <br>
      <a href="selectsql.php">select.phpへ</a>
</body>
</html>