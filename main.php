<h1 class="text-center">統一發票紀錄與對獎</h1>

<div class="container">
  <div class="row">
    <div class="col-8 d-flex justify-content-between p-3 mx-auto border">
      <?php
      $month = [
        1 => "1,2月",
        2 => "3,4月",
        3 => "5,6月",
        4 => "7,8月",
        5 => "9,10月",
        6 => "11,12月",
      ];
      $m = ceil(date("m") / 2);
      ?>
      <h2><?= $month[$m]; ?></h2>
      <div class="text-center ">
        <a href="" class="btn btn-outline-warning">當期發票</a>
      </div>
      <div class="text-center">
        <a href="" class="btn btn-outline-warning">對獎</a>
      </div>
      <div class="text-center">
        <a href="" class="btn btn-outline-warning">輸入獎號</a>
      </div>
    </div>
    <div class="col-8 d-flex justify-content-center p-3 mx-auto border">
      <form action="api/add_invoice.php" method="post">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label>日期:</label>
            <input class="form-control" type="date" name="date">
          </div>
          <div class="form-group col-md-6">
            <label>期別:</label>
            <select name="period" id="" class="form-control">
              <option value="1">1,2</option>
              <option value="2">3,4</option>
              <option value="3">5,6</option>
              <option value="4">7,8</option>
              <option value="5">9,10</option>
              <option value="6">11,12</option>
            </select>
          </div>
          <div class="form-group col-md-12">
            <label>發票號碼:</label>
            <input class="form-control" type="text" name="code" >
            <input class="form-control" type="number" name="number">
          </div>
          <div class="form-group col-md-12">
            <label>發票金額:</label>
            <input class="form-control" type="number" name="payment" >
          </div>
          <div class="mx-auto">
            <input class="btn btn-primary" type="submit" value="送出">
          </div>
        </div>
    </div>
    </form>
  </div>
</div>
</div>