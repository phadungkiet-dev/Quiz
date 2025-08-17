<?php
$headers = [100, 7, 107, 3, 104];
$values  = array_fill(0, count($headers), '');
$error   = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST['data'] ?? [];
    // print_r($data);

    $values = array_map(
        fn($index) => isset($data[$index]) ? trim((string)$data[$index]) : '',
        array_keys($headers)
    );

    $index = array_keys(array_filter($values, fn($value) => $value !== '' && is_numeric($value)));
    // print_r($index);
    if (!$index) {
        $error = 'กรุณาป้อนตัวเลขในช่องป้อนข้อมูลใดช่องหนึ่งจากห้าช่อง';
    } else {
        $baseIndex = $index[0];
        $factor    = (float)$values[$baseIndex] / $headers[$baseIndex];

        array_walk($values, function (&$value, $index) use ($headers, $baseIndex, $factor) {
            if ($index !== $baseIndex) {
                $value = number_format($headers[$index] * $factor, 2, '.', '');
            }
        });
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz2 (PHP)</title>
    <style>
    table,
    th,
    td {
        border: 1px solid black;
    }
    </style>
</head>

<body>

    <?php if ($error): ?>
    <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <p>ผู้ใช้กรอกได้ 1 ช่อง</p>
    <br />
    <form id="test" method="post">
        <table id="table1" style="width: 50%">
            <tr>
                <?php foreach ($headers as $header): ?>
                <th style="width: 10%;"><?= $header ?></th>
                <?php endforeach; ?>
            </tr>
            <tr>
                <?php foreach ($headers as $key => $header): ?>
                <td>
                    <input type="number" name="data[<?= $key ?>]" style="width: 100%; box-sizing: border-box;"
                        value="<?= $values[$key] ?>">
                </td>
                <?php endforeach; ?>
            </tr>
        </table>
        <br />
        <button type="submit" name="go" value="1">GO</button>
        &nbsp;&nbsp;
        <a href="">Clear</a>
    </form>
</body>

</html>