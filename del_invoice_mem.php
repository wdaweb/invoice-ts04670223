<?php
include_once "base.php";

if(isset($_GET['del'])){
    $pdo->exec("delete from invoices where id='{$_GET['id']}'");
    header("location:mem.php?do=invoice_list_mem");
}else{

  $inv=$pdo->query("select * from invoices where id='{$_GET['id']}'")->fetch();
?>

<div class="col-md-6 mx-auto ">
  <div class="text-center mb-2">確認要刪除以下發票資料嗎?</div>
  <ul class="list-group">
    <li class="list-group-item text-center"><?=$inv['code'].$inv['number'];?></li>
    <li class="list-group-item text-center"><?=$inv['date'];?></li>
    <li class="list-group-item text-center"><?=$inv['payment'];?></li>
  </ul>
  <div class="text-center mt-2">
      <a class="btn btn-outline-danger" href="?do=del_invoice&del=1&id=<?=$_GET['id'];?>">確認</a>
    <a class="btn btn-outline-dark" href="?do=invoice_list_mem">取消</a>
    </div>
    </div>
<?php
}
?>