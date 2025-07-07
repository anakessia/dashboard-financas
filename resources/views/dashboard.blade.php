@extends('layouts.index')

@section('title', 'Dashboard')

@section('content')
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
@endsection

@push('scripts')
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('graficoPizza').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: @json($labels),
                datasets: [{
                    data: @json($data),
                    backgroundColor: ['#4F46E5', '#F59E0B', '#10B981', '#6366F1', '#F97316'],
                }]
            }
        });
    </script>
@endpush
