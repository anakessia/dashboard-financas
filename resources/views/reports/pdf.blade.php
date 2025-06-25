<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Relatório de Despesas</title>
    <link rel="stylesheet" href="{{ public_path('css/pdf.css') }}" />

</head>

<body>

    <h1>{{ isset($total) ? 'Relatório Mensal de Despesas' : 'Relatório de Todas as Despesas' }}</h1>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Valor</th>
                <th>Categoria</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($expenses as $expense)
                <tr>
                    <td>{{ $expense->name }}</td>
                    <td>R$ {{ number_format($expense->amount, 2, ',', '.') }}</td>
                    <td>{{ $expense->category }}</td>
                    <td>{{ \Carbon\Carbon::parse($expense->spent_at)->format('d/m/Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Nenhuma despesa encontrada.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @isset($total)
        <p class="total">Total do mês: R$ {{ number_format($total, 2, ',', '.') }}</p>
    @endisset

</body>

</html>
