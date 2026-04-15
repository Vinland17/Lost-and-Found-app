<?php
$items = json_decode(file_get_contents("items.json"), true);

if (!is_array($items)) $items = [];

$type = $_GET['type'] ?? "";
$search = $_GET['search'] ?? "";
?>

<!DOCTYPE html>
<html>
<head>
<title>Lost & Found</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h1>🎒 Lost & Found System</h1>

<a href="login.php"><button>Admin Login</button></a>
<a href="report.php"><button>Report Item</button></a>

<form method="GET">
<input type="text" name="search" placeholder="Search item...">

<select name="type">
<option value="">All</option>
<option value="Lost">Lost</option>
<option value="Found">Found</option>
</select>

<button>Apply</button>
</form>

<p>Total Items: <?= count($items) ?></p>

<div class="container">

<?php if (!empty($items)): ?>
<?php foreach ($items as $item): ?>

<?php
if ($type && $item['type'] != $type) continue;
if ($search && stripos($item['name'], $search) === false) continue;
?>

<div class="card">

<h3><?= $item['name'] ?></h3>

<p class="badge <?= strtolower($item['type']) ?>">
<?= $item['type'] ?>
</p>

<p><?= $item['description'] ?></p>
<p>📍 <?= $item['location'] ?></p>
<p>📞 <?= $item['contact'] ?></p>

</div>

<?php endforeach; ?>
<?php else: ?>
<p>No items available</p>
<?php endif; ?>

</div>

</body>
</html>