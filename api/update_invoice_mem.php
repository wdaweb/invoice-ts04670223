<?php
include_once "../base.php";
// $sql="update 
// invoices 
// set 
// `code`='{$_POST['code']}',
// `number`='{$_POST['number']}',
// `date`='{$_POST['date']}',
// `payment`='{$_POST['payment']}' 
// where 
// `id`='{$_POST['id']}'";
$row=find('invoices',$_POST['id']);
$row['code']=$_POST['code'];
$row['number']=$_POST['number'];
$row['date']=$_POST['date'];
$row['payment']=$_POST['payment'];

save('invoices',$row);

accept('code','發票的欄位為必填');
length('code',2,2,'長度需為2位數');
accept('number','發票的欄位為必填');
length('number',8,8,'長度需為8位數');
// $pdo->exec($sql);
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
to('../mem.php?do=invoice_list_mem');
// header("location:../index.php?do=invoice_list");

?>
