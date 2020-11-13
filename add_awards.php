  <form class="mx-auto" action="api/add_award_number.php" method="post">
    <table class="table table-bordered table-sm" summary="統一發票中獎號碼單">
      <tbody>
        <tr>
          <th id="group0">年月份</th>
          <td headers="group0" class="title">
            <input type="number" name="year" min="<?= date("Y") - 1; ?>" max="<?= date("Y") + 1; ?>" step="1" value="<?= date("Y"); ?>">
            年

            <select name="period" id="">
              <option value="1">01~02</option>
              <option value="2">03~04</option>
              <option value="3">05~06</option>
              <option value="4">07~08</option>
              <option value="5">09~10</option>
              <option value="6">11~12</option>
            </select>月

          </td>
        </tr>
        <tr>
          <th id="special_prize" rowspan="2">特別獎</th>
          <td headers="group1" class="number">
            <input type="number" name="special_prize" min="00000001" max="99999999"></td>
        </tr>
        <tr>
          <td headers="specialPrize"> 同期統一發票收執聯8位數號碼與特別獎號碼相同者獎金1,000萬元 </td>
        </tr>
        <tr>
          <th id="grand_prize" rowspan="2">特獎</th>
          <td headers="group2" class="number">
            <input type="number" name="grand_prize" min="00000001" max="99999999">
          </td>
        </tr>
        <tr>
          <td headers="grandPrize"> 同期統一發票收執聯8位數號碼與特獎號碼相同者獎金200萬元 </td>
        </tr>
        <tr>
          <th id="firstprize" rowspan="2">頭獎</th>
          <td headers="group3" class="number">
            <input type="number" name="first_prize[]" min="00000001" max="99999999">
            <input type="number" name="first_prize[]" min="00000001" max="99999999">
            <input type="number" name="first_prize[]" min="00000001" max="99999999">
            <p></p>
          </td>
        </tr>
        <tr>
          <td headers="firstPrize"> 同期統一發票收執聯8位數號碼與頭獎號碼相同者獎金20萬元 </td>
        </tr>
        <tr hidden>
          <th id="group4">二獎</th>
          <td headers="group4"> 同期統一發票收執聯末7 位數號碼與頭獎中獎號碼末7 位相同者各得獎金4萬元 </td>
        </tr>
        <tr hidden>
          <th id="group5">三獎</th>
          <td headers="group5"> 同期統一發票收執聯末6 位數號碼與頭獎中獎號碼末6 位相同者各得獎金1萬元 </td>
        </tr>
        <tr hidden>
          <th id="group6">四獎</th>
          <td headers="group6"> 同期統一發票收執聯末5 位數號碼與頭獎中獎號碼末5 位相同者各得獎金4千元 </td>
        </tr>
        <tr hidden>
          <th id="group7">五獎</th>
          <td headers="group7"> 同期統一發票收執聯末4 位數號碼與頭獎中獎號碼末4 位相同者各得獎金1千元 </td>
        </tr>
        <tr hidden>
          <th id="group8">六獎</th>
          <td headers="group8"> 同期統一發票收執聯末3 位數號碼與 頭獎中獎號碼末3 位相同者各得獎金2百元 </td>
        </tr>
        <tr>
          <th id="addSixprize">增開六獎</th>
          <td headers="group9" class="number">
            <input type="number" name="add_six_prize[]" min="001" max="999">
            <input type="number" name="add_six_prize[]" min="001" max="999">
            <input type="number" name="add_six_prize[]" min="001" max="999">
          </td>
        </tr>
      </tbody>
    </table>
    <div class="text-center">
      <input type="submit" value="儲存" class="btn btn-outline-danger">
      <input type="reset" value="清空" class="btn btn-outline-dark">
    </div>
  </form>