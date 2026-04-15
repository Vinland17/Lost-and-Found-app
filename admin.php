<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$adminName = $_SESSION['admin'];

$items = json_decode(file_get_contents("items.json"), true);
if (!is_array($items)) $items = [];
?>

<h1 style="text-align:center;">Admin Panel</h1>

<p style="text-align:center;">Welcome, <b><?= $adminName ?></b></p>

<div style="text-align:center;">
<a href="logout.php"><button>Logout</button></a>
</div>

<?php if (!empty($items)): ?>
<?php foreach ($items as $item): ?>

<div style="border:1px solid #ccc; margin:10px; padding:10px; text-align:center;">

<b><?= $item['name'] ?></b><br>
<?= $item['type'] ?>

<form action="delete.php" method="POST">
<input type="hidden" name="name" value="<?= $item['name'] ?>">
<button style="background:red;">Delete</button>
</form>

</div>

<?php endforeach; ?>
<?php else: ?>
<p style="text-align:center;">No items available</p>
<?php endif; ?>