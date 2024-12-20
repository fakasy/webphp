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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <div class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-yellow-400 via-orange-500 to-red-600 animate-gradient-x"></div>
        <div class="absolute inset-0">
            <?php for ($i = 0; $i < 20; $i++): ?>
                <div class="absolute w-4 h-4 bg-white rounded-full opacity-20 animate-float" style="left: <?php echo rand(0, 100) ?>%; top: <?php echo rand(0, 100) ?>%; animation-delay: <?php echo rand(0, 5) ?>s; animation-duration: <?php echo rand(5, 10) ?>s;"></div>
            <?php endfor; ?>
        </div>
        <div class="relative w-96 backdrop-blur-lg bg-white/30 p-8 rounded-2xl shadow-2xl transform hover:scale-105 transition-all duration-300">
            <div class="text-center mb-8">
                <div class="inline-block p-3 rounded-full bg-yellow-500 mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-white mb-2">Welcome Back!</h2>
                <p class="text-white/80">Enter your credentials to continue</p>
            </div>
            <form class="space-y-6" action="" method="post">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <input type="text" name="username" class="w-full pl-10 pr-4 py-3 rounded-lg bg-white/20 border border-white/30 text-white placeholder-white/70 focus:outline-none focus:ring-2 focus:ring-yellow-500 transition-all" placeholder="Username" required />
                </div>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m6.354 2.354a4 4 0 00-5.656 0M12 15v2m0 5.28a1 1 0 01-.942 1.217l-3.158 2.185a1 1 0 01-.635.17m-4.8 0a1 1 0 01-.635-.17L3.158 13.82a1 1 0 01-.942-1.217V15m6.354 2.354a4 4 0 00-5.656 0M12 15v2m0 5.28a1 1 0 01-.942 1.217l-3.158 2.185a1 1 0 01-.635.17m-4.8 0a1 1 0 01-.635-.17L3.158 13.82a1 1 0 01-.942-1.217V15" />
                        </svg>
                    </div>
                    <input type="password" name="password" class="w-full pl-10 pr-4 py-3 rounded-lg bg-white/20 border border-white/30 text-white placeholder-white/70 focus:outline-none focus:ring-2 focus:ring-yellow-500 transition-all" placeholder="Password" required />
                </div>
                <button type="submit" name="submit" class="w-full bg-gradient-to-r from-yellow-500 to-yellow-600 text-white font-bold py-3 px-4 rounded-lg hover:from-yellow-600 hover:to-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 focus:ring-offset-gray-800 transform hover:scale-105 transition-all duration-300">Sign In</button>
            </form>
            <div class="mt-6 text-center text-white/80">
                <a href="#" class="hover:text-white transition-colors duration-200">Forgot Password?</a>
            </div>
        </div>
    </div>
</body>
</html>


