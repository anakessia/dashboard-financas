<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'FinGestor')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="bg-gray-100 h-screen flex overflow-hidden">

    <!-- Sidebar -->
    <aside class="w-64 h-screen bg-indigo-700 text-white flex flex-col">
        <div class="p-6 text-lg font-semibold border-b border-indigo-600">
            FinGestor
            <p class="text-sm text-indigo-300">Bem-vindo(a) de volta!</p>
        </div>
        <nav class="flex-1 p-4 space-y-2">
            <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 rounded hover:bg-indigo-800">
                <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                <span class="ml-2">Dashboard</span>
            </a>

            <a href="{{ route('expenses.index') }}" class="flex items-center px-4 py-2 rounded hover:bg-indigo-500">
                <i data-lucide="wallet" class="w-5 h-5"></i>
                <span class="ml-2">Despesas</span>
            </a>

            <a href="{{ route('reports.index') }}" class="flex items-center px-4 py-2 rounded hover:bg-indigo-600">
                <i data-lucide="bar-chart-3" class="w-5 h-5"></i>
                <span class="ml-2">Relatórios</span>
            </a>
        </nav>
        <form method="POST" action="{{ route('logout') }}" class="p-4 mt-auto">
            @csrf
            <button type="submit" class="flex items-center px-4 py-2 w-full hover:bg-indigo-500 rounded">
                <i data-lucide="log-out" class="w-5 h-5"></i>
                <span class="ml-2">Sair</span>
            </button>
        </form>
    </aside>

    <!-- Conteúdo Principal -->
    <main class="flex-1 h-full overflow-y-auto p-8">
        @yield('content')
    </main>

    <script>
        window.addEventListener('DOMContentLoaded', () => {
            lucide.createIcons();
        });
    </script>

    @stack('scripts')
</body>

</html>
