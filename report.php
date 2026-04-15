<?php
if ($_POST) {

$items = json_decode(file_get_contents("items.json"), true);
if (!is_array($items)) $items = [];

$new = [
    "name" => $_POST['name'],
    "type" => $_POST['type'],
    "description" => $_POST['description'],
    "location" => $_POST['location'],
    "contact" => $_POST['contact']
];

$items[] = $new;

file_put_contents("items.json", json_encode($items, JSON_PRETTY_PRINT));

echo "<script>
alert('Item Reported Successfully!');
window.location='index.php';
</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Report Item</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Report Item</h1>

<form method="POST">
<input name="name" placeholder="Item Name" required>

<select name="type">
<option value="Lost">Lost</option>
<option value="Found">Found</option>
</select>

<input name="description" placeholder="Description" required>
<input name="location" placeholder="Location" required>
<input name="contact" placeholder="Contact" required>

<button>Submit</button>
</form>

</body>
</html>