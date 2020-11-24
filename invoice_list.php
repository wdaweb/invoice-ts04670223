<?php
include_once("base.php");
if (isset($_GET['pd'])) {
    $period = $_GET['pd'];
} else {
    $period = ceil(date("m") / 2);
}
$pageNow = 1;
$pageNumber = 10;
$rowCount = $pdo->query("select count(period) from `invoices` where period='$period'")->fetch();
if (!empty($_GET['i'])) {
    $pageNow = $_GET['i'];
}
$pageSum = ceil($rowCount[0] / $pageNumber);
$pageStar = ($pageNow - 1) * $pageNumber;
$sql = "select * from `invoices` where period='$period' order by date desc LIMIT $pageStar,$pageNumber";

$rows = $pdo->query($sql)->fetchAll();


// foreach ($rows as $row) {
//     echo $row['code'] . $row['number'] . "<br>";
// }

?>
<div class="row justify-content-center mx-auto">
    <div class="btn-group mb-2 ">
        <a class="btn btn-secondary" href="?do=invoice_list&pd=1">1~2月</a>
        <a class="btn btn-secondary" href="?do=invoice_list&pd=2">3~4月</a>
        <a class="btn btn-secondary" href="?do=invoice_list&pd=3">5~6月</a>
        <a class="btn btn-secondary" href="?do=invoice_list&pd=4">7~8月</a>
        <a class="btn btn-secondary" href="?do=invoice_list&pd=5">9~10月</a>
        <a class="btn btn-secondary" href="?do=invoice_list&pd=6">11~12月</a>
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
                        <a href="?do=edit_invoice&id=<?= $row['id']; ?>"><button class="btn btn-outline-dark fas fa-highlighter" data-toggle="tooltip" data-placement="top" title="編輯"></button></a>
                        <a href="?do=del_invoice&id=<?= $row['id']; ?>"><button class="btn btn-outline-danger fas fa-trash" data-toggle="tooltip" data-placement="top" title="刪除"></button></a>
                        <a href="?do=award&id=<?= $row['id']; ?>"><button class="btn btn-outline-warning fas fa-trophy" data-toggle="tooltip" data-placement="top" title="對獎"></button></a>
                    </td>
                </tr>
            </tbody>
</div>
<?php
        }
?>
</table>
<!-- <div class="dropdown">
    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Dropdown link
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <?php
        // for ($i = 1; $i <= $pageSum; $i++) {
        //     echo "<a class='dropdown-item btn btn-secondary' href='?do=invoice_list&i=$i&pd=$period'>$i</a> ";
        // }
        ?>
    </div>
</div> -->

<form action="index.php" method="get">
    <input type="hidden" name="do" value="invoice_list">
    <input type="hidden" name="pd" value="<?= $period ?>">
    <select name="i" onchange="submit()">
        <?php
        for ($i = 1; $i <= $pageSum; $i++) {
            echo "<option value='$i'>" . $i . "</option>";
        }
        ?>
    </select>
</form>