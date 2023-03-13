<?php
  // filter_inPUT();はセキュリティ対策
  $book_title = filter_input(INPUT_POST, 'book_title', FILTER_SANITIZE_SPECIAL_CHARS);

  require('DB_connect.php');
  // 以下不要
  // $db = new mysqli('localhost:8889', 'root', 'root', 'mydb');

  $stmt = $db -> prepare('insert into books(title) value(?)');

  // SQL操作でerrorの時はerror表示してとめる
  if (!$stmt) {
    die($db -> error);
  }
  $stmt -> bind_param('s', $book_title);
  $ret = $stmt -> execute();
  
  if ($ret):
    echo '成功';
?>
  <a href="index.php">一覧へ</a>
<?php
   else: 
    echo $db -> error;
  ifend;


?>