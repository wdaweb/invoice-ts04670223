<?php
include_once "base.php";
session_start();
if (isset($_SESSION['login'])) {
    $sql_user = "select `member`.`role`,`login`.`acc` from member,login where `member`.`login_id`=`login`.`id` && acc='{$_SESSION['login']}'";
    $user = $pdo->query($sql_user)->fetch(PDO::FETCH_ASSOC);
    // exit();
    switch ($user['role']) {
        case '會員';
            header('location:mem.php');
            break;
        case 'VIP';
            header('location:vip.php');
            break;
        case '管理員';
            header('location:admin.php');
            break;
    }
}
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

        a h1 {
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
        <a href="index.php" style="text-decoration:none;">
            <h1 class="text-center p-3">統一發票紀錄與對獎</h1>
        </a>
        <div class="col-10 d-flex justify-content-between p-3 mx-auto border">
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
            <a href="?do=invoice_list&pd=<?= $m; ?>">
                <h3><?= $month[$m]; ?></h3>
            </a>
            <div class="text-center">
                <a href="index.php" class="btn btn-outline-light">回首頁</a>
            </div>
        </div>

        <div style="background-color:rgba(244,219,179,1);" class="col-10 d-flex p-2 mx-auto border justyfy-content-center ">
        <div class="container">
        <h4 class="text-center">註冊帳號</h4>
        <form action="add_user.php" method="post" class=" col-6  m-auto">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">帳號:</label>
                    <input type="text" name="acc" class="form-control"placeholder="請輸入帳號">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">密碼:</label>
                    <input type="password" name="pw" class="form-control"placeholder="請輸入密碼">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">姓名:</label>
                    <input type="text" name="name" class="form-control"placeholder="請輸入姓名">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">生日:</label>
                    <input type="date" name="birthday" class="form-control"placeholder="請輸入生日">
                </div>
                <div class="form-group col-md-12">
                    <label for="inputEmail4">地址:</label>
                    <input type="text" name="addr" class="form-control"placeholder="請輸入地址">
                </div>
                <div class="form-group col-md-12">
                    <label for="inputEmail4">Email:</label>
                    <input type="email" name="email" class="form-control"placeholder="請輸入Email">
                </div>
                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">學歷:</label>
                    <select name="education" id="" class="custom-select my-1 mr-sm-2">
                        <option value="國中">國中</option>
                        <option value="高中">高中</option>
                        <option value="大學/專科">大學/專科</option>
                        <option value="碩士">碩士</option>
                        <option value="博士">博士</option>
                    </select>
                    <input type="submit" value="確認新增"class="btn btn-primary my-3" >
                    <input type="reset" value="重置" class="btn btn-primary m-3">
        </form>
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