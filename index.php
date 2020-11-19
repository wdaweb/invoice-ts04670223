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
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@400&display=swap');
        * {
            font-family: 'Noto Sans TC', sans-serif;
        }

        .number {
            font-size: 1.2rem;
            color: red;
            font-weight: bolder;
        }
        body{
            background-color: rgba(251, 251, 251, 1);
        }
    </style>
</head>

<body>
    <a href="index.php" style="text-decoration:none;">
        <h1 class="text-center text-dark">統一發票紀錄與對獎</h1>
    </a>
    <div class="container">
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
            <h3><?= $month[$m]; ?></h3>
            <div class="text-center ">
                <a href="?do=invoice_list" class="btn btn-outline-warning">當期發票</a>
            </div>
            <div class="text-center">
                <a href="?do=award_numbers" class="btn btn-outline-warning">對獎</a>
            </div>
            <div class="text-center">
                <a href="?do=add_awards" class="btn btn-outline-warning">輸入獎號</a>
            </div>
            <div class="text-center">
                <a href="index.php" class="btn btn-outline-warning">回首頁</a>
            </div>
        </div>

        <div class="col-10 d-flex p-3 mx-auto border justyfy-content-center">
            <?php
            if (isset($_GET['do'])) {
                $file = $_GET['do'] . ".php";
                include $file;
            } else {
                include "main.php";
            }
            ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
<?php $_SESSION['err']=[];?>