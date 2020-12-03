<?php

$dsn="mysql:host=localhost;dbname=invoice;charset=utf8";
$pdo=new PDO($dsn,'root','');

date_default_timezone_set("Asia/Taipei");
session_start();
$awardStr=['頭','二','三','四','五','六'];



function accept($field,$meg='此欄位不得為空')
{
  if (empty($_POST[$field])) {
    $_SESSION['err'][$field]['empty'] = $meg;
  }
}
function length($field, $min, $max,$meg='長度不足')
{
  if (strlen($_POST[$field]) > $max || strlen($_POST[$field]) < $min) {
    $_SESSION['err'][$field]['len']=$meg;
  }
}

function email($field,$meg='email格式錯誤'){
  $email=$_POST[$field];
  if(mb_strpos($email,'@')==false){
    $_SESSION['err'][$field]['email']=$meg;
  }
}

function errFeedBack($field)
{
  if (!empty($_SESSION['err'][$field])) {
    foreach ($_SESSION['err'][$field] as $err) {
      echo "<div style='font-size:16px; color:#F53563;'>";
      echo $err;
      echo "</div>";
    }
  }
}
function find($table, $id)
{
  global $pdo;
  $sql = "select * from $table where ";
  if (is_array($id)) {
    foreach ($id as $key => $value) {
      $tmp[] = sprintf("`%s`='%s'", $key, $value);
      // $tmp[]="`".$key."`='".$value."'";
    }
    $sql = $sql . implode(" && ", $tmp);
  } else {
    $sql = $sql . "id='$id'";
  }

  $row = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
  // mysqli_fetch_assoc();
  return $row;
}

function all($table, ...$arg)
{
  global $pdo;

  // echo gettype($arg);
  $sql = "select * from $table ";

  if (isset($arg[0])) {
    if (is_array($arg[0])) {
      // 製作會在where後面的字串
      if (!empty($arg[0])) {
        foreach ($arg[0] as $key => $value) {
          $tmp[] = sprintf("`%s`='%s'", $key, $value);
        }
        $sql = $sql . " where " . implode(' && ', $tmp);
      } else {
        // 製作非陣列的語句接再$sql後面
        $sql = $sql . $arg[0];
      }
    }
  }
  if (isset($arg[1])) {
    // 製作接在最後面的句子字串
    $sql = $sql . $arg[1];
  } else {
  }
  // echo $sql . "<br>";
  return $pdo->query($sql)->fetchAll();
}
function del($table,$id){
  global $pdo;
  $sql = "delete from $table where ";
  if (is_array($id)) {
    foreach ($id as $key => $value) {
      $tmp[] = sprintf("`%s`='%s'", $key, $value);
      // $tmp[]="`".$key."`='".$value."'";
    }
    $sql = $sql . implode(" && ", $tmp);
  } else {
    $sql = $sql . " id='$id'";
  }
  // echo $sql;
  $row=$pdo->exec($sql);

  return $row;
}
function update($table,$array){
  global$pdo;
  $sql="update $table set";
  foreach ($array as $key => $value) {
    if ($key!='id') {
      $tmp[] = sprintf("`%s`='%s'", $key, $value);
    }
    // $tmp[]="`".$key."`='".$value."'";
  }
$sql=$sql.implode(",",$tmp)."where `id`='{$array['id']}'";
$pdo->exec($sql);
}

function insert($table,$array){
global$pdo;
$sql="insert into $table(`". implode("`,`",array_keys($array))   ."`)  values('".implode("','",$array)."')";
$pdo->exec($sql);
}
function save($table,$array){
  if (isset($array['id'])) {
  update($table,$array);
  }else{
  insert($table,$array);
  }
}
function to($url){
  header("location:".$url);
}
function q($sql){
  global $pdo;
  return $pdo->query($sql)->fetchAll();
}


function captcha($n)
{
  $str = "";
  for ($i = 0; $i < $n; $i++) {
    $type = rand(1, 3);
    switch ($type) {
      case 1:
        $str = $str . chr(rand(65, 90));
        break;
      case 2:
        $str = $str . chr(rand(97, 122));
        break;
      case 3:
        $str = $str . chr(rand(48, 57));
        break;
    }
  }
  return $str;
}
// $type2=chr(rand(97,122));
// $type3=chr(rand(48,57));


// 產生底圖
function cpatchapic($str)
{
  $fontsize =rand(16,30);
  $vv = 10;
  $fontlist = ['arial.ttf', 'arialbd.ttf', 'arialbi.ttf'];
  $fontpath = realpath("./font/{$fontlist[0]}");
  $ttbox = imagettfbbox($fontsize, 0, $fontpath, $str);
  $w = $ttbox[2] - $ttbox[0] + ($vv * 2) + (mb_strlen($str) * 10);
  $h = $ttbox[1] - $ttbox[7]+ ($vv * 2) +10;
  $base_img = imagecreatetruecolor($w, $h);
  $color = imagecolorallocate($base_img, rand(200, 255), rand(200, 255), rand(200, 255));
  imagefill($base_img, 0, 0, $color);



  $x = 15;
  $y = 15;
  for ($i=0;$i<strlen($str); $i++) {
    $fontcolor = imagecolorallocate($base_img,rand(0,150),rand(0,150),rand(0, 150));
    $char = mb_substr($str, $i, 1);
    $angle = rand(30, -30);
    $ttbox = imagettfbbox($fontsize, $angle, $fontpath, $char);
    // print_r($ttbox);
    $tw=$ttbox[2]-$ttbox[0];
    $th=$ttbox[1]-$ttbox[7];
    $yz=$y+$th+rand(5, -5);
    imagettftext($base_img,$fontsize,$angle,$x,$yz,$fontcolor, $fontpath,$char);
    $x=$x+$tw+10;
    // imagestring($base_img,5,$x,20,$char,$fontcolor);
  }
  // $h1=8;
  // imageline($base_img,0,$h1,$w,$h1,$linecolor);
  // imageline($base_img,0,$h1+8,$w,$h1+8,$linecolor);
  // imageline($base_img,0,$h1+12,$w,$h1+12,$linecolor);
  // 產生隨機亂數線條
$lines=5;
    for ($i = 0; $i < $lines; $i++) {
      $linecolor = imagecolorallocate($base_img,rand(50,200),rand(50,200),rand(50,200));

      imageline($base_img,rand(0,0+$vv),rand(0,$h),rand($w,$w-$vv),rand(0,$h),$linecolor);
    }
  // function aa($a){
    //   global $w;
    //   global $base_img;
    //   global $h;
    //   global $linecolor;
    //   for ($i=0; $i <$a ; $i++) { 
      //     imageline($base_img,0,0,$w+$a,$h+$a,$linecolor);
      //   }
      // }
      
      // echo $fontpath;
      
      
      
      
      
      $dst_path = "./captcha/base_img.png";
      imagepng($base_img, $dst_path);
      return $dst_path;
    }
      // echo "<div>";
// echo "<img src='$dst_path'>";
// echo "</div>";

?>