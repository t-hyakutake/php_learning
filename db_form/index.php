<?php
  // DBにアクセス
  require('DB_connect.php');
  $all_books = $db -> query('select * from books ORDER by id desc');
  //SQLを取得できない時はerror表示
  if (!$all_books) {
    die($db -> error);
  }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>books</title>
</head>
<body>
  <p>book一覧</p>
  <?php
    while ($book = $all_books -> fetch_assoc()):
  ?>

  <p><a href="#"><?php echo htmlspecialchars($book['title']); ?></a></p>
  <p><?php echo htmlspecialchars($book['id']); ?></p>
  <hr>
  <?php endwhile; ?>
 <a href="index.html">入力ページへ</a>
</body>
</html>