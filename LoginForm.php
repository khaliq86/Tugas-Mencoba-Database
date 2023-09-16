<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="asset/main.css">
</head>

<body>
    <div>
        <h1 style="font-size: 50px;">Halaman Login</h1>
        <form action="" method="post">
            <table>
                <tr>
                    <td>
                        <label for="username">Username</label>
                    </td>
                    <td>
                        <input type="text" name="username" id="username" placeholder="Masukkan Username">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="password">Password</label>
                    </td>
                    <td>
                        <input type="password" name="password" id="password" placeholder="Masukkan Password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" name="login" style="width: 100%;">Login</button>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a href="Register.php">Register</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>

<?php
require_once("koneksi.php");
include_once("Model.php");


session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new model();

    $data = $user->getUserData($username, $password);

    foreach ($data as $row) {
        $user = $row['username'];
        $pass = $row['password'];
    }
    if ($username == $user && $password == $pass) {
        header("Location: index.php");
        $_SESSION['is_login'] = 1;
        $_SESSION['username'] = $username;

    } else {
        echo "<script>alert('Username atau Password Salah')</script>";
        $_SESSION['is_login'] = 0;
    }
}


?>