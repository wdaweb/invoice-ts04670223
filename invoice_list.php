<?php
include_once("base.php");
if (isset($_GET['pd'])) {
    $period = $_GET['pd'];
} else {
    $period = ceil(date("m") / 2);
}

$sql = "select * from `invoices` where period='$period' order by date desc";

$rows = $pdo->query($sql)->fetchAll();


// foreach ($rows as $row) {
//     echo $row['code'] . $row['number'] . "<br>";
// }

?>
<div class="row justify-content-center mx-auto">
    <div class="btn-group mb-2 ">
        <a class="btn btn-secondary" href="?do=invoice_list&pd=<?= $period = 1; ?>">1~2月</a>
        <a class="btn btn-secondary" href="?do=invoice_list&pd=<?= $period = 2; ?>">3~4月</a>
        <a class="btn btn-secondary" href="?do=invoice_list&pd=<?= $period = 3; ?>">5~6月</a>
        <a class="btn btn-secondary" href="?do=invoice_list&pd=<?= $period = 4; ?>">7~8月</a>
        <a class="btn btn-secondary" href="?do=invoice_list&pd=<?= $period = 5; ?>">9~10月</a>
        <a class="btn btn-secondary" href="?do=invoice_list&pd=<?= $period = 6; ?>">11~12月</a>
    </div>
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
                        <a href="?do=edit_invoice&id=<?= $row['id']; ?>"><button class="btn btn-outline-dark fas fa-highlighter"  data-toggle="tooltip" data-placement="top" title="編輯"></button></a>
                        <a href="?do=del_invoice&id=<?= $row['id']; ?>"><button  class="btn btn-outline-danger fas fa-trash" data-toggle="tooltip" data-placement="top" title="刪除"></button></a>
                        <a href="?do=award&id=<?= $row['id']; ?>"><button class="btn btn-outline-warning fas fa-trophy"  data-toggle="tooltip" data-placement="top" title="對獎"></button></a>
                    </td>
                </tr>
            </tbody>
</div>
<?php
        }
?>
</table>