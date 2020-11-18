<?php
include_once("base.php");

$period=ceil(date("m")/2);

$sql = "select * from `invoices` where period='$period' order by date desc";

$rows = $pdo->query($sql)->fetchAll();

// foreach ($rows as $row) {
//     echo $row['code'] . $row['number'] . "<br>";
// }

?>

<table class="table text-center">
    <thead>
        <tr>
            <th>發票號碼</th>
            <th>消費日期</th>
            <th>消費金額</th>
            <th>操作</th>
        </tr>
    </thead>
    <?php
    foreach ($rows as $row) {
    ?>
        <tbody>
            <tr>
                <td><?= $row['code'] . $row['number']; ?></td>
                <td><?= $row['date']; ?></td>
                <td><?= $row['payment']; ?></td>
                <td>
                    <a href="?do=edit_invoice&id=<?=$row['id'];?>"><button class="btn btn-outline-dark">編輯</button></a>
                    <a href="?do=del_invoice&id=<?=$row['id'];?>"><button class="btn btn-outline-danger">刪除</button></a>
                    <a href="?do=award&id=<?=$row['id'];?>"><button class="btn btn-outline-warning">對獎</button></a>
                </td>
            </tr>
        </tbody>
    <?php
    }
    ?>
</table>