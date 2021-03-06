<?php
include_once "base.php";
$sql = "select * from invoices where id='{$_GET['id']}'";
$inv = $pdo->query($sql)->fetch();

// echo "<pre>";
// print_r($inv);
// echo "</pre>";
?>
<form class="mx-auto p-3" action="api/update_invoice_mem.php" method="post">
  <div class="form-row">
    <input type="hidden" name="id" value="<?= $inv['id']; ?>">
    <div class="form-row">
      <div class="form-group  col-md-12">
        <label>發票號碼:</label>
        <div class="form-row">
          <div class="col-3">
            <input class="form-control" type="text" name="code" value="<?= $inv['code']; ?>">
          </div>
          <div class="col-9">
            <input class="form-control" type="text" name="number" value="<?= $inv['number']; ?>">
          </div>
        </div>
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
        <a href="mem.php?do=invoice_list_mem" class="btn btn-outline-light">返回</a>
      </div>
    </div>
  </div>
</form>