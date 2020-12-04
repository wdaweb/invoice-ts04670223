<?php
include_once "base.php";
// if (isset($_SESSION['login'])) {
//     $sql_user = "select `member`.`role`,`login`.`acc` from member,login where `member`.`login_id`=`login`.`id` && acc='{$_SESSION['login']}'";
//     $user = $pdo->query($sql_user)->fetch(PDO::FETCH_ASSOC);
//     // exit();
//     switch ($user['role']) {
//         case '會員';
//             header('location:mem.php');
//             break;
//         case '管理員';
//             header('location:admin.php');
//             break;
//     }
// }
$str = captcha(6);
$img = cpatchapic($str);
$_SESSION['ans'] = $str;
// if (isset($_POST['ans'])) {
//     echo "你輸入的驗證碼為:" . $_POST['ans'];
//     echo "<br>";
//     echo "要比對的驗證碼內容為:" . $str;
//     echo "<br>";
//     echo "原始的的驗證碼內容為:" . $_POST['src'];
//     if ($_POST['ans'] == $_SESSION['ans']) {
//         echo "你輸入的驗證碼正確";
//     } else {
//         echo  "你輸入的驗證碼錯誤";
//     }
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>統一發票紀錄及對獎系統</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            width: 100vw;
            height: 100vh;
            background-color: #0F4C81;
            color: #0F4C81;
        }

        h3 {
            color: #F4DBB3;
        }

        h1 {
            color: #F4DBB3;
        }

        thead {
            font-weight: 900;
        }

        table {
            font-weight: 600;
            color: #0F4C81 !important;
        }
    </style>
</head>

<body>
    <div class="container">
            <h1 class="text-center p-3">統一發票紀錄與對獎</h1>
        <div class="col-12 d-flex justify-content-between p-3 mx-auto border">
            <?php
            $month = [
                1 => "1~2月",
                2 => "3~4月",
                3 => "5~6月",
                4 => "7~8月",
                5 => "9~10月",
                6 => "11~12月",
            ];
            $m = ceil(date("m") / 2);
            ?>
            <h3 class="m-auto"><?= $month[$m]; ?></h3>
        </div>

        <div style="background-color:rgba(244,219,179,1);" class="col-12 d-flex p-2 mx-auto border justyfy-content-center ">
            <div class="container ">
                <div class="col-6  m-auto">
                    <div class="text-center" style="font-size:16px; color:#F53563;"><?php if (isset($_GET['meg'])) {
                                                                                        echo $_GET['meg'];
                                                                                    } ?></div>
                    <h5 class="col-12 text-center py-3 border-bottom">會員登入</h5>
                    <form action="check.php" class="mt-3 col-12 mx-auto" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">帳號：</label>
                            <input type="text" name="acc" class="form-control" placeholder="請輸入帳號">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">密碼：</label>
                            <input type="password" name="pw" class="form-control" placeholder="請輸入密碼">
                            <p class="d-flex justify-content-around" style="font-size:0.87rem">
                                <a href="forget_pw.php">忘記密碼?</a>
                                <a href="register.php">註冊新帳號</a>
                            </p>
                            <?= "<img src='$img'>"; ?>
                            <input type="text" class="form-control" name="ans">
                            <input type="hidden" name="src" value="<?= $str; ?>">
                        </div>
                        <input type="submit" value="登入" class="btn btn-primary mx-auto">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
</body>

</html>
<?php $_SESSION['err'] = []; ?>