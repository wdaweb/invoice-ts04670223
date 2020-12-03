<?php
include_once "base.php";
/******登入檢查******
 * 1. 連線資料庫
 * 2. 取得表單傳遞的帳密資料
 * 3. 比對會員資料表中是否有相符的資料
 * 4. 取得會員資料
 * 5. 檢查會員身份及權限
 * 6. 依據會員身份導向不同的頁面
 */

$acc = $_POST['acc'];
$pw = $_POST['pw'];
$_SESSION['login']=$acc;
// 建立檢查帳號密碼的SQL語法
$sql = "select * from `login` where `acc`='$acc' && `pw`='$pw'";
$check = $pdo->query($sql)->fetch();
// $sql="select count(*) from `login` where `acc`='$acc' && `pw`='$pw'";
// $check=$pdo->query($sql)->fetchColumn();
// 判斷回傳值是否為空
if (isset($_POST['ans'])) {
  if ($_POST['ans'] == $_SESSION['ans']) {
    if (!empty($check)) {
      // 取得會員個人資料
      $member_sql = "select * from `member` where login_id='{$check['id']}'";
      $member = $pdo->query($member_sql)->fetch();
      $role = $member['role'];
    
      switch ($role) {
        case '會員';
          header('location:mem.php');
          break;
        case '管理員';
          header('location:admin.php');
          break;
      }
    } else {
      header("location:index.php?meg=帳密不正確，請重新登入或註冊新帳號");
    }
  } else {
    header("location:index.php?meg=你輸入的驗證碼錯誤");
  }
}
// if (!empty($check)) {
//   // 取得會員個人資料
//   $member_sql = "select * from `member` where login_id='{$check['id']}'";
//   $member = $pdo->query($member_sql)->fetch();
//   $role = $member['role'];

//   switch ($role) {
//     case '會員';
//       header('location:mem.php');
//       break;
//     case '管理員';
//       header('location:admin.php');
//       break;
//   }
// } else {
//   header("location:index.php?meg=帳密不正確，請重新登入或註冊新帳號");
// }
