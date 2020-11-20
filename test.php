<?php

include_once "base.php";

function find($table,$id){
  global $pdo;
  if (is_numeric($id)) {
    $sql="select * from $table where id='$id'";
  }else{
    $sql="select * from $table where $id";
  }

  $row=$pdo->query($sql)->fetch();

  return $row;
}

$row=find('invoices',16);
echo $row['code'].$row['number']."<br>";

$row=find('invoices',17);
echo $row['code'].$row['number']."<br>";


?>