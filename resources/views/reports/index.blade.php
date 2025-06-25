<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Relatórios</title>
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

    <!-- Conteúdo principal -->
    <main class="flex-1 h-full overflow-hidden">
        <div class="p-8 h-full overflow-y-auto">
            <h1 class="text-2xl font-bold mb-6">Relatórios de Despesas</h1>

            <a href="{{ route('reports.monthly') }}"
                class="bg-indigo-600 text-white px-4 py-2 rounded mb-4 inline-flex items-center gap-2" target="_blank">
                <i data-lucide="download"></i>
                Baixar Relatório em PDF
            </a>


            <div class="overflow-x-auto bg-white shadow rounded">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nome</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Valor</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Categoria</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Data</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($expenses as $expense)
                            <tr>
                                <td class="px-6 py-4">{{ $expense->name }}</td>
                                <td class="px-6 py-4">R$ {{ number_format($expense->amount, 2, ',', '.') }}</td>
                                <td class="px-6 py-4">{{ $expense->category }}</td>
                                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($expense->spent_at)->format('d/m/Y') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </main>

    <script>
        window.addEventListener('DOMContentLoaded', () => {
            lucide.createIcons();
        });
    </script>
</body>

</html>
