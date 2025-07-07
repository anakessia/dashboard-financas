@extends('layouts.index')

@section('title', 'Relatórios de Despesas')

@section('content')
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
                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($expense->spent_at)->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
