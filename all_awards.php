<table class="table text-center">
<?php
include_once "base.php";




$period_str = [
    1 => '1~2月',
    2 => '3~4月',
    3 => '5~6月',
    4 => '7~8月',
    5 => '9~10月',
    6 => '11~12月'
];
echo "<th colspan=3>";
echo $_GET['year'] . "年";
echo $period_str[$_GET['period']] . "發票";
echo "</th>";
// 撈出該期的發票
$invoices = $pdo->query("select * from invoices where period='{$_GET['period']}' AND left(date,4)='{$_GET['year']}' order by date desc")->fetchAll();
// $invoices=$pdo->query("select * from invoices where period='{$_GET['period']}' AND left(date,4)='{$_GET['year']}' order by date desc")->fetchAll();
// echo "<pre>";
// print_r($invoices);
// echo "</pre>";

// 撈出該期的開獎獎號
$invoicesa = $pdo->query("select * from `award_numbers` where period='{$_GET['period']}' AND year='{$_GET['year']}'")->fetchAll();
// echo "<pre>";
// print_r($invoicesa);
// echo "</pre>";

$all_res = -1;

foreach ($invoices as $inv) {

    // 對獎程式
    $number = $inv['number'];



    // 找出獎號

    // 1.確認期數->目前的發票日期做分析
    // 2.得到期數的資料後->撈出該期的開講獎號

    $date = $inv['date'];
    // explode('-',$date)取的日期資料的陣列,陣列的元素就是月
    // 月份就可以推算期數,有了期數及年份就可以找到開獎的號碼
    // $array=explode('-',$date)
    // $month=$array[1]
    // $period=ceil($month/2)
    $year = explode('-', $date)[0];
    $period = ceil(explode('-', $date)[1] / 2);

    // $awards = $pdo->query("select *  from award_numbers where year='$year' && period='$period'")->fetchAll();



    foreach ($invoicesa as $award) {
        switch ($award['type']) {
            case 1:
                // 特別號=我的發票號碼
                if ($award['number'] == $number) {
                    echo"<tr>";
                    echo "<td>號碼=" . $number . "</td>";
                    echo "<td>中特別獎</td>";
                    echo "<td>中獎金額1,000萬元</td>";
                    echo "</tr>";
                    $all_res = 1;
                }
                break;
            case 2:
                if ($award['number'] == $number) {
                    echo"<tr>";
                    echo "<td>號碼=" . $number . "</td>";
                    echo "<td>中特獎</td>";
                    echo "<td>中獎金額200萬元</td>";
                    echo"</tr>";
                    $all_res = 1;
                }
                break;
            case 3:
                $res = -1;
                for ($i = 5; $i >= 0; $i--) {
                    $target = mb_substr($award['number'], $i, (8 - $i), 'utf-8');
                    $mynumber = mb_substr($number, $i, (8 - $i), 'utf-8');

                    if ($target == $mynumber) {

                        $res = $i;
                    } else {
                        break;
                        // continue
                    }
                }
                if ($res != -1) {
                    echo"<tr>";
                    echo "<td>號碼=" . $number . "</td>";
                    echo "<td>中{$awardStr[$res]}獎</td>";
                    echo"</tr>";
                    $all_res = 1;
                }
                break;
            case 4:
                if ($award['number'] == mb_substr($number, 5, 3, 'utf-8')) {
                    echo"<tr>";
                    echo "<td>號碼=" . $number . "</td>";
                    echo "<td>中了增開六獎</td>";
                    echo "<td>中獎金額2百元</td>";
                    echo"</tr>";
                    $all_res = 1;
                }
                break;
        }
    }
}
if ($all_res == -1) {
    echo"<tr>";
    echo "<td>很可惜，都沒有中</td>";
    echo"</tr>";
}
?>
</table>