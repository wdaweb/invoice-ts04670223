<?php

include_once "base.php";

// echo implode("&&",['欄位1'=>'值1','欄位2'=>'值2','id'=>'9']);
// 利用一個暫時陣列存放語句
$array=['欄位1'=>'值1','欄位2'=>'值2','id'=>'9'];
foreach($array as $key => $value){
  $tmp[]=sprintf("`%s`='%s'",$key,$value);
  // $tmp[]="`".$key."`='".$value."'";
}
// print_r($tmp);
echo implode("&&",$tmp);

function find($table,$id){
  global $pdo;
  $sql="select * from $table where ";
  if (is_array($id)) {
    foreach($id as $key => $value){
      $tmp[]=sprintf("`%s`='%s'",$key,$value);
      // $tmp[]="`".$key."`='".$value."'";
    }
    $sql=$sql.implode(" && ",$tmp);
  }else{
    $sql=$sql."id='$id'";
  }

  $row=$pdo->query($sql)->fetch();

  return $row;
}


$row=find('invoices',16);
echo "<br>".$row['code'].$row['number']."<br>";

$row=find('invoices',17);
echo $row['code'].$row['number']."<br>";

$row=find('invoices',['code' => 'FJ','number'=>'61956613']);
echo $row['code'].$row['number']."<br>";

?>