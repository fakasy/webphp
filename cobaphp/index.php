    <?php 
    session_start();
    if (!isset($_SESSION['username'])) {
        header('Location: login.php');
        exit();
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

<h1 class="text-2xl font-bold mb-4">Selamat datang, <span class="text-red-500"><?php echo $_SESSION['username']; ?></span></h1>

<a href="logout.php" class="px-4 py-2 rounded text-white bg-red-500 hover:bg-red-700">Logout</a>
</body>
</html>