<?php
include_once "base.php";
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
        h3{
            color: #F4DBB3;
        }

        a h1 {
            color: #F4DBB3;
        }
        thead{
            font-weight:900;
        }

        table {
            font-weight:600;
            color: #0F4C81 !important;
        }

    </style>
</head>

<body>
    <div class="container">
        <a href="admin.php" style="text-decoration:none;">
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
            <a href="?do=invoice_list_admin&pd=<?=$m;?>"><h3><?= $month[$m]; ?></h3></a>
            <div class="text-center ">
                <a href="?do=invoice_list_admin" class="btn btn-outline-light">當期發票</a>
            </div>
            <div class="text-center">
                <a href="?do=award_numbers" class="btn btn-outline-light">對獎</a>
            </div>
            <div class="text-center">
                <a href="?do=add_awards" class="btn btn-outline-light">輸入開獎獎號</a>
            </div>
            <div class="text-center">
                <a href="admin.php" class="btn btn-outline-light">輸入發票</a>
            </div>
            <div class="text-center">
                <a href="exit.php" class="btn btn-outline-light">登出</a>
            </div>
        </div>

        <div style="background-color:rgba(244,219,179,1);" class="col-10 d-flex p-2 mx-auto border justyfy-content-center ">
            <?php
            if (isset($_GET['do'])) {
                $file = $_GET['do'] . ".php";
                include $file;
            } else {
                include "main_admin.php";
            }
            ?>
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