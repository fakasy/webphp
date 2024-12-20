<?php   
include 'koneksi.php';
    if (!isset($_SESSION['username'])) {
        header('Location: login.php');
        exit();
    }
    
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO user (username, pass) VALUES (?, ?)";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, 'ss', $username, $password);
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
    <title>Enhanced Login Form</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">

</head>
<body>
    <div class="min-h-screen bg-gradient-to-br from-yellow-300 to-yellow-500 flex items-center justify-center p-4">
        <div class="max-w-md w-full">
            <!-- Card Container -->
            <div class="bg-white rounded-xl shadow-2xl p-8 space-y-6">
                <!-- Header -->
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold text-yellow-600 mb-2">Tambah User</h1>
                    <p class="text-gray-500"></p>
                </div>

                <form action="" method="post" class="space-y-6">
                    <!-- Username Field -->
                    <div class="space-y-2">
                        <label class="block text-yellow-700 text-sm font-bold mb-2" for="username">
                            Username
                        </label>
                        <div class="relative">
                            <input type="text" 
                                name="username" 
                                id="username"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 transition-all duration-200 outline-none text-gray-700"
                                placeholder="Enter your username">
                        </div>
                    </div>

                    <!-- Password Field -->
                    <div class="space-y-2">
                        <label class="block text-yellow-700 text-sm font-bold mb-2" for="password">
                            Password
                        </label>
                        <div class="relative">
                            <input type="password" 
                                name="password" 
                                id="password"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 transition-all duration-200 outline-none text-gray-700"
                                placeholder="Enter your password">
                        </div>
                    </div>

                    <!-- Additional Features -->


                    <!-- Submit Button -->
                    <button type="submit" 
                        name="submit"
                        class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 px-4 rounded-lg transition-colors duration-200 flex items-center justify-center space-x-2">
                        <span>Tambah</span>
                    </button>
                </form>

                <!-- Footer -->
                <div class="text-center text-gray-500 text-sm">
                
                </div>
            </div>
        </div>
    </div>
</body>
</html>