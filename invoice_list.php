<?php
include_once("base.php");

$sql = "select * from `invoices` order by date desc";

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
                    <a href="?do=edit.invoice&id=<?=$row['id'];?>"><button class="btn btn-dark">編輯</button></a>
                    <button class="btn btn-danger">刪除</button>
                </td>
            </tr>
        </tbody>
    <?php
    }
    ?>
</table>