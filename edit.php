<?php
include 'koneksi.php';
if (!isset($_SESSION['username'])) {    
    header('Location: login.php');
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM user WHERE id = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
} else {
    header('Location: index.php');
    exit();
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);    

    $query = "UPDATE user SET username = ?, pass = ? WHERE id = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, 'ssi', $username, $password, $id);
    mysqli_stmt_execute($stmt);
    header('Location: index.php');
    exit();

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>
<div class="min-h-screen bg-gradient-to-br from-yellow-300 to-yellow-500 flex items-center justify-center p-4">
    <div class="max-w-md w-full">
        <div class="bg-white rounded-xl shadow-2xl p-8">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-yellow-600 mb-2">Edit User</h1>
            </div>

            <form action="" method="post" class="space-y-6">
                <div class="space-y-2">
                    <label class="block text-yellow-700 text-sm font-bold mb-2" for="username">
                        Username
                    </label>
                    <input 
                        type="text" 
                        name="username" 
                        id="username"
                        value="<?php echo $row['username']; ?>"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 transition-all duration-200 outline-none text-gray-700"
                    >
                </div>

                <div class="space-y-2 ">

                    <input 
                        type="hidden" 
                        name="password" 
                        id="password"
                        value="<?php echo $row['pass']; ?>" 
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 transition-all duration-200 outline-none text-gray-700"
                    >
                </div>

                <div class="flex items-center justify-between gap-4">
                    <a href="index.php" 
                       class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-3 px-6 rounded-lg transition-colors duration-200">
                        Batal
                    </a>
                    <button 
                        type="submit" 
                        name="submit"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 px-6 rounded-lg transition-colors duration-200">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>