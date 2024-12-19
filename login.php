<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($_POST['password'], $row['pass'])) {
            $_SESSION['username'] = $username;
            header('Location: index.php');
            exit();
        } else {
            echo "<script>alert('Username atau password salah. Silahkan coba lagi.');</script>";
        }
    } else {
        echo "<script>alert('Username atau password salah. Silahkan coba lagi.');</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <title>Document</title>
</head>
<body>
    <div class="flex items-center justify-center h-screen bg-yellow-400">
    <div class="flex items-center justify-center">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-96">
            <form action="" method="post">
                <div class="mb-4">
                    <label class="block text-yellow-700 text-sm font-bold mb-2" for="username">Username:</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-yellow-700 leading-tight focus:outline-none focus:shadow-outline" id="username" name="username" type="text" required>
                </div>
                <div class="mb-6">
                    <label class="block text-yellow-700 text-sm font-bold mb-2" for="password">Password:</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-yellow-700 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" required>
                </div>
                <div class="flex items-center justify-between">
                    <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>


