<form class="mx-auto p-2" action="api/add_invoice_mem.php" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label >日期:</label>
      <input class="form-control" type="date" name="date">
      <?php errFeedBack('date');?>
    </div>
    <div class="form-group col-md-6">
      <label >期別:</label>
      <select name="period" id="" class="form-control">
        <option value="1">1~2月</option>
        <option value="2">3~4月</option>
        <option value="3">5~6月</option>
        <option value="4">7~8月</option>
        <option value="5">9~10月</option>
        <option value="6">11~12月</option>
      </select>
    </div>
    <div class="form-group col">
      <label >發票號碼:</label>
      <div class="form-row">
        <div class="col-3">

          <input class="form-control" type="text" name="code">
          <?php errFeedBack('code');?>
        </div>
        <div class="col-9">
          <input class="form-control" type="number" name="number">
          <?php errFeedBack('number');?>
        </div>
      </div>
    </div>
    <div class="form-group col-md-12">
      <label >發票金額:</label>
      <input class="form-control" type="number" name="payment">
      <?php errFeedBack('payment');?>
    </div>
    <div class="mx-auto">
      <input type="hidden" name="name_id" value="<?=$_SESSION['login'];?>">
      <input  class="btn btn-outline-light" type="submit" value="送出">
    </div>
  </div>
  </div>
</form>