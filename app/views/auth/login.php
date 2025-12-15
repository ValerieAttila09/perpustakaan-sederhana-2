<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title']; ?> - Perpustakaan Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200 h-screen flex justify-center items-center">

    <div class="w-full max-w-sm bg-white p-8 rounded-lg shadow-lg">
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-gray-800">Login Admin</h2>
            <p class="text-gray-600">Perpustakaan Sekolah</p>
        </div>

        <form action="<?= BASEURL; ?>/auth/authenticate" method="POST">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">Username</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" 
                       id="username" name="username" type="text" placeholder="Username" required>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" 
                       id="password" name="password" type="password" placeholder="******************" required>
            </div>
            <div class="flex items-center justify-between">
                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-150" 
                        type="submit" name="login">
                    Sign In
                </button>
            </div>
        </form>
        <div class="mt-4 text-center">
            <a href="<?= BASEURL; ?>" class="text-sm text-blue-500 hover:text-blue-800">Kembali ke Beranda</a>
        </div>
    </div>

</body>
</html>
