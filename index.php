    <?php 
    include 'koneksi.php';
    if (!isset($_SESSION['username'])) {
        header('Location: login.php');
        exit();
    }
    if (isset($_GET['action']) && $_GET['action'] == 'hapus') {
        $id = $_GET['id'];
        $query = "DELETE FROM user WHERE id = ?";
        $stmt = mysqli_prepare($koneksi, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
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
    <title>CRUD User Management</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard CRUD</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
    <style>
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }

        .gradient-bg {
            background: linear-gradient(-45deg, #4f46e5, #7c3aed, #2563eb, #3b82f6);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }

        .glass-effect {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.9);
        }

        .hover-scale {
            transition: all 0.3s ease;
        }

        .hover-scale:hover {
            transform: scale(1.02);
        }

        .table-animation {
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .button-animation {
            transition: all 0.3s ease;
        }

        .button-animation:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>
<body class="gradient-bg min-h-screen p-8">
    <div class="max-w-6xl mx-auto">
        <!-- Header Section -->
        <div class="glass-effect rounded-xl shadow-2xl p-8 mb-8 hover-scale">
            <h1 class="text-4xl font-bold mb-3 bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-purple-600">
                Selamat datang, <span><?php echo $_SESSION['username']; ?></span>
            </h1>
            <h3 class="text-gray-600 text-xl">Sistem Manajemen User CRUD</h3>
        </div>

        <!-- Main Content -->
        <div class="glass-effect rounded-xl shadow-2xl p-8">
            <!-- Action Buttons -->
            <div class="flex gap-6 mb-8">
                <a href="tambah.php" class="button-animation px-8 py-3 rounded-lg text-white bg-gradient-to-r from-green-500 to-emerald-600 flex items-center font-semibold">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Tambah User
                </a>
                <a href="logout.php" class="button-animation px-8 py-3 rounded-lg text-white bg-gradient-to-r from-red-500 to-pink-600 flex items-center font-semibold">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    Logout
                </a>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto rounded-xl shadow-lg table-animation">
                <table class="min-w-full">
                    <thead class="bg-gradient-to-r from-gray-100 to-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">Username</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">Password</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php
                        $query = "SELECT * FROM user";
                        $result = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap text-gray-700"><?php echo $row['username']; ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-700"><?php echo $row['pass']; ?></td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex gap-4">
                                        <a href='edit.php?id=<?php echo $row['id']; ?>' 
                                           class="button-animation px-4 py-2 rounded-lg text-blue-600 hover:bg-blue-50 flex items-center">
                                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                            Edit
                                        </a>
                                        <a href='index.php?action=hapus&id=<?php echo $row['id']; ?>' 
                                           class="button-animation px-4 py-2 rounded-lg text-red-600 hover:bg-red-50 flex items-center"
                                           onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                            Hapus
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>