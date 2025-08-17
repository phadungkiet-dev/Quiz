<?php
$output = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $number = intval($_POST["number"]);

    if ($number > 0) {
        $isEven = $number % 2 === 0;
        for ($i = 0; $i < $number; $i++) {
            $stars = $isEven ? $i + 1 : $number - $i;
            $output .= str_repeat("*", $stars) . "<br>";
        }
    } else {
        $output = "กรุณาป้อนตัวเลขในช่องป้อนข้อมูลและค่าต้องมากกว่า 0";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz1 (PHP)</title>
</head>

<body>
    <form method="post">
        <label>Number of Star : </label>
        <input type="number" name="number" required>
        <button type="submit">Go</button>
    </form>
    <br>
    <div class="result">
        <?php echo $output; ?>
        <br>
    </div>
</body>

</html>