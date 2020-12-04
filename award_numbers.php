<?php

include_once "base.php";

if (isset($_GET['pd'])) {
  $year = explode("-", $_GET['pd'])[0];
  $period = explode("-", $_GET['pd'])[1];
} else {
  $get_news = $pdo->query("SELECT * FROM `award_numbers` order by year DESC , period desc LIMIT 1")->fetch();
  // $get_news=$pdo->query("SELECT*FROM`award_numbers`WHERE  year = (SELECT year FROM `award_numbers`ORDER BY year DESC,period DESC LIMIT 1) && 
  // period = (SELECT period FROM `award_numbers`ORDER BY year DESC,period DESC LIMIT 1)")->fetch();
  $year = $get_news['year'];
  $period = $get_news['period'];
}


$awards = $pdo->query("select * from award_numbers where year='$year' && period='$period'")->fetchAll();
$special = "";
$grand = "";
$first = [];
$six = [];

foreach ($awards as $aw) {
  switch ($aw['type']) {
    case 1:
      $special = $aw['number'];

      break;
    case 2:
      $grand = $aw['number'];
      break;
    case 3:
      $first[] = $aw['number'];
      break;
    case 4:
      $six[] = $aw['number'];
      break;
  }
}


?>
<div class="row justify-content-center mx-auto">
  <div class="btn-group mb-2" >
    <a class="btn btn-outline-light" href="?do=award_numbers&pd=<?= $year; ?>-1">1~2月</a>
    <a class="btn btn-outline-light" href="?do=award_numbers&pd=<?= $year; ?>-2">3~4月</a>
    <a class="btn btn-outline-light" href="?do=award_numbers&pd=<?= $year; ?>-3">5~6月</a>
    <a class="btn btn-outline-light" href="?do=award_numbers&pd=<?= $year; ?>-4">7~8月</a>
    <a class="btn btn-outline-light" href="?do=award_numbers&pd=<?= $year; ?>-5">9~10月</a>
    <a class="btn btn-outline-light" href="?do=award_numbers&pd=<?= $year; ?>-6">11~12月</a>
  </div>
  <table class="table  table-sm mx-auto" summary="統一發票中獎號碼單">

    <tbody>
      <tr>
        <th id="group0">年月份</th>
        <td headers="group0" class="title">
          <?= $year; ?>年
          <?php
          $month = [
            1 => "01~02",
            2 => "03~04",
            3 => "05~06",
            4 => "07~08",
            5 => "09~10",
            6 => "11~12"
          ];
          echo $month[$period];

          ?>月

        </td>
      </tr>
      <tr>
        <th id="special_prize" rowspan="2">特別獎</th>
        <td headers="group1" class="number">
          <?= $special; ?>
        </td>
      </tr>
      <tr>
        <td headers="specialPrize"> 同期統一發票收執聯8位數號碼與特別獎號碼相同者獎金1,000萬元 </td>
      </tr>
      <tr>
        <th id="grand_prize" rowspan="2">特獎</th>
        <td headers="group2" class="number">
          <?= $grand; ?>
        </td>
      </tr>
      <tr>
        <td headers="grandPrize"> 同期統一發票收執聯8位數號碼與特獎號碼相同者獎金200萬元 </td>
      </tr>
      <tr>
        <th id="firstprize" rowspan="2">頭獎</th>
        <td headers="group3" class="number">
          <?php
          foreach ($first as $f) {
            echo $f . "<br>";
          }
          ?>

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
          <?php
          foreach ($six as $s) {
            echo $s . "<br>";
          }
          ?>
        </td>
      </tr>
    </tbody>
  </table>
  <a href="?do=all_awards&year=<?= $year; ?>&period=<?= $period; ?>" class="btn btn-outline-warning fas fa-trophy" data-toggle="tooltip" data-placement="top" title="對獎"></a>
</div>