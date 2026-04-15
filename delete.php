<?php
$items = json_decode(file_get_contents("items.json"), true);

$name = $_POST['name'];

$items = array_filter($items, function($i) use ($name) {
    return $i['name'] != $name;
});

file_put_contents("items.json", json_encode(array_values($items), JSON_PRETTY_PRINT));

header("Location: admin.php");
?>