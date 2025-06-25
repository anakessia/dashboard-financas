<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <form action="/login" method="POST" class="bg-white p-6 rounded-xl shadow-md w-96">
        @csrf
        <h2 class="text-2xl font-bold mb-4 text-center">FinGestor</h2>

        <label for="email" class="block mb-2 text-sm text-gray-700">E-mail</label>
        <input type="email" name="email" required class="w-full px-4 py-2 border rounded mb-4 focus:outline-none focus:ring-2 focus:ring-indigo-500">

        <label for="password" class="block mb-2 text-sm text-gray-700">Senha</label>
        <input type="password" name="password" required class="w-full px-4 py-2 border rounded mb-6 focus:outline-none focus:ring-2 focus:ring-indigo-500">

        <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700 transition">
            Entrar
        </button>
    </form>
</body>
</html>
