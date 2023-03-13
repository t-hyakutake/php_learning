
<!-- 税金をreturnする関数 -->
<?php
function intax($value) { // 引数は関数の外の$priceと不一致だが、問題ないようである
  
  $tax = 1.1;
  return floor($value * $tax);
}
?>