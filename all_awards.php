<?php
include_once "base.php";




$period_str=[
  1=>'1,2月',
  2=>'3,4月',
  3=>'5,6月',
  4=>'7,8月',
  5=>'9,10月',
  6=>'11,12月'
];

echo "你要對的發票是".$_GET['year']."年的";
echo $period_str[$_GET['period']]."的發票";

// 撈出該期的發票
$invoices=$pdo->query("select * from invoices where period='{$_GET['period']}' AND left(date,4)='{$_GET['year']}' order by date desc")->fetchAll(PDO::FETCH_ASSOC);
// echo "<pre>";
// print_r($invoices);
// echo "</pre>";

// 撈出該期的開獎獎號
$invoicesa=$pdo->query("select * from `award_numbers` where period='{$_GET['period']}' AND year='{$_GET['year'] }'")->fetchAll(PDO::FETCH_ASSOC);
// echo "<pre>";
// print_r($invoicesa);
// echo "</pre>";





?>
單期全部對獎
