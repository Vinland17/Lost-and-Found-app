<?php
session_start();
$error = "";

if ($_POST) {
    if ($_POST['user'] === "admin" && $_POST['pass'] === "1234") {

        $_SESSION['admin'] = "admin";

        echo "<script>
        alert('Login Successful!');
        window.location='admin.php';
        </script>";
        exit();
    } else {
        $error = "Invalid Login";
    }
}
?>

<form method="POST" style="text-align:center; margin-top:100px;">
<h2>Admin Login</h2>

<?php if ($error) echo "<p style='color:red;'>$error</p>"; ?>

<input name="user" placeholder="Username"><br>
<input name="pass" type="password" placeholder="Password"><br>
<button>Login</button>
</form>