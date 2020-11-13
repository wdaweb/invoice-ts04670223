<?php
include_once "base.php";
$sql = "select * from invoices where id='{$_GET['id']}'";
$inv = $pdo->query($sql)->fetch();

// echo "<pre>";
// print_r($inv);
// echo "</pre>";
?>
<form action="api/update_invoice.php" method="post">
  <div class="form-row">
    <input type="hidden" name="id" value="<?= $inv['id']; ?>">
    <div class="form-row">
      <div class="form-group  col-md-12">
        <label>發票號碼:</label>
        <input class="form-control" type="text" name="code" value="<?= $inv['code']; ?>">
        <input class="form-control" type="text" name="number" value="<?= $inv['number']; ?>">
      </div>
      <div class="form-group col-md-6">
        <label>消費日期:</label>
        <input class="form-control" type="date" name="date" value="<?= $inv['date']; ?>">
      </div>
      <div class="form-group col-md-6">
        <label>消費金額:</label>
        <input class="form-control" type="text" name="payment" value="<?= $inv['payment']; ?>">
      </div>
      <div class="text-center mt-2 mx-auto">
        <input class="btn btn-outline-danger" type="submit" value="修改">
        <input class="btn btn-outline-dark" type="reset" value="重置">
      </div>
    </div>
</form>