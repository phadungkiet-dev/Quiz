<?php
$array1 = [
    ['Code' => '101', 'Name' => 'AAA'],
    ['Code' => '102', 'Name' => 'BBB'],
    ['Code' => '103', 'Name' => 'CCC']
];
// foreach ($array1 as $row) {
//     echo "Code: " . $row['Code'] . ", Name: " . $row['Name'] . "<br>";
// }
$array2 = [
    ['Code' => '103', 'City' => 'Singapore'],
    ['Code' => '102', 'City' => 'Tokyo'],
    ['Code' => '101', 'City' => 'Bangkok'],
];
// foreach ($array2 as $row) {
//     echo "Code: " . $row['Code'] . ", City: " . $row['City'] . "<br>";
// }
$headers_array1 = array_keys($array1[0]);
// print_r($headers_array1);
$headers_array2 = array_keys($array2[0]);
// print_r($headers_array2);

$mergeArray = [];

foreach ($array1 as $row1) {
    $found = false;
    foreach ($array2 as $row2) {
        if ($row1["Code"] === $row2["Code"]) {
            $mergeArray[] = array_merge($row1, ["City" => $row2["City"]]);
            $found = true;
            break;
        }
    }
    if (!$found) {
        $mergeArray[] = array_merge($row1, ["City" => null]);
    }
}
// print_r($mergedArray);
$headers_merge = array_keys($mergeArray[0]);
// print_r($headers_output);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz3 (PHP)</title>
    <style>
    table,
    th,
    td {
        border: 1px solid black;
    }
    </style>
</head>

<body>
    <h3>array1</h3>
    <table style="width: 20%">
        <tr>
            <?php
            foreach ($headers_array1 as $header_array1) {
                echo "<th>" . ($header_array1) . "</th>";
            }
            ?>
        </tr>
        <?php
        foreach ($array1 as $row) {
            echo "<tr>";
            foreach ($row as $cell) {
                echo "<td style='width:50%'>" . ($cell) . "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>

    <h3>array2</h3>
    <table style="width: 20%">
        <tr>
            <?php
            foreach ($headers_array2 as $header_array2) {
                echo "<th>" . ($header_array2) . "</th>";
            }
            ?>
        </tr>
        <?php
        foreach ($array2 as $row) {
            echo "<tr>";
            foreach ($row as $cell) {
                echo "<td style='width:50%'>" . ($cell) . "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
    <hr>
    <h3>output</h3>
    <table style="width: 30%">
        <tr>
            <?php
            foreach ($headers_merge as $header_merge) {
                echo "<th>" . ($header_merge) . "</th>";
            }
            ?>
        </tr>
        <?php
        foreach ($mergeArray as $row) {
            echo "<tr>";
            foreach ($row as $cell) {
                echo "<td style='width:33%'>" . ($cell) . "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>


</body>

</html>