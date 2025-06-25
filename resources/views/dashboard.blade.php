<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

    <!-- Conteúdo principal -->
    <main class="flex-1 h-full overflow-hidden">
        <div class="p-8 h-full overflow-y-auto">
            <h1 class="text-2xl font-bold mb-6">Dashboard</h1>

            <!-- Cards superiores -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-gray-500">Despesas Totais</h2>
                    <p class="text-2xl font-bold">R$ {{ number_format($total, 2, ',', '.') }}</p>
                    <span class="text-sm text-gray-400">Este mês</span>
                </div>
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-gray-500">Maior Despesa</h2>
                    <p class="text-2xl font-bold">R$ {{ number_format($maiorValor, 2, ',', '.') }}</p>
                    <span class="text-sm text-gray-400">{{ $maiorCategoria }}</span>
                </div>
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-gray-500">Cotação do Dólar</h2>
                    <p class="text-2xl font-bold">R$ {{ $usd }}</p>
                    <span class="text-sm text-gray-400">Atual</span>
                </div>
            </div>

            <!-- Gráfico -->
            <div class="bg-white p-4 rounded shadow w-full max-h-[800px]">
                <h3 class="text-lg font-semibold mb-4">Gastos por Categoria</h3>
                <canvas id="graficoPizza" class="w-full max-h-[420px]"></canvas>
            </div>

        </div>

    </main>

    <script>
        const ctx = document.getElementById('graficoPizza').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: @json($labels),
                datasets: [{
                    data: @json($data),
                    backgroundColor: ['#4F46E5', '#6366F1', '#818CF8', '#A5B4FC', '#C7D2FE'],
                }]
            }
        });
    </script>

    <script>
        window.addEventListener('DOMContentLoaded', () => {
            lucide.createIcons();
        });
    </script>
</body>

</html>
