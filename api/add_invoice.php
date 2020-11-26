<?php
//撰寫新增消費發票的程式碼
//將發票的號碼及相關資訊寫入資料庫

include_once "../base.php";
$_SESSION['err']=[];
// foreach($_POST as $key => $value){
//   $tmp[]=$key;
// }
// foreach($_POST as $key => $value){
//   $tmp2[]=$value;
// }
// echo "<pre>";
// print_r($tmp);
// echo "</pre>";
echo "<pre>";
print_r(array_keys($_POST));
echo "</pre>";
accept('code','發票的欄位為必填');
length('code',2,2,'長度需為2位數');
accept('number','發票的欄位為必填');
length('number',8,8,'長度需為8位數');
accept('payment','發票金額的欄位為必填');
accept('date','日期的欄位為必填');
echo "<br>";
// echo "inserts into invoices (`".implode("`,`",array_keys($_POST))."`)";
// echo "values('".implode("','",$_POST)."')";

save('invoices',$_POST);
// $sql="insert into invoices (`".implode("`,`",array_keys($_POST))."`)values('".implode("','",$_POST)."')";
// echo $sql;
echo "新增完成";


if(empty($_SESSION['err'])){
  $pdo->exec($sql);
  header("location:../index.php?do=invoice_list");
}else{
  header("location:../index.php");

}

?>