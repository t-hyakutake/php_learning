<?php
  require('DB_connect.php');
  
  $stmt = $db -> prepare('SELECT `id`, `name` FROM `members` WHERE id=?;');

  $id = 3; 
  $stmt -> bind_param('i', $id);
  $stmt -> execute();

  $stmt -> bind_result($id, $name);
  $stmt -> fetch();


?>
<div>
    <?php 
     echo htmlspecialchars($name); 
    ?> 
</div>

