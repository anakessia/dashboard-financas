@extends('layouts.index')

@section('title', 'Despesas')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Despesas</h1>
        <button onclick="openModal('createModal')" class="bg-indigo-600 text-white px-4 py-2 rounded">
            + Nova Despesa
        </button>
    </div>

    @if (session('success'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full table-auto bg-white shadow rounded">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left">Nome</th>
                    <th class="px-4 py-2 text-left">Valor</th>
                    <th class="px-4 py-2 text-left">Categoria</th>
                    <th class="px-4 py-2 text-left">Data</th>
                    <th class="px-4 py-2 text-left">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($expenses as $expense)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $expense->name }}</td>
                        <td class="px-4 py-2">R$ {{ number_format($expense->amount, 2, ',', '.') }}</td>
                        <td class="px-4 py-2">{{ $expense->category }}</td>
                        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($expense->spent_at)->format('d/m/Y') }}</td>
                        <td class="px-4 py-2 flex space-x-2">
                            <button onclick="openModal('editModal{{ $expense->id }}')"
                                class="bg-yellow-400 px-2 py-1 rounded">
                                Editar
                            </button>
                            <button onclick="openModal('deleteModal{{ $expense->id }}')"
                                class="bg-red-500 text-white px-2 py-1 rounded">
                                Excluir
                            </button>
                        </td>
                    </tr>

                    <!-- Modal Editar -->
                    <div id="editModal{{ $expense->id }}"
                        class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                        <div class="bg-white p-6 rounded w-96">
                            <h2 class="text-xl mb-4">Editar Despesa</h2>
                            <form method="POST" action="{{ route('expenses.update', $expense) }}">
                                @csrf
                                @method('PUT')

                                <div class="mb-2">
                                    <label class="block">Nome</label>
                                    <input type="text" name="name" value="{{ $expense->name }}"
                                        class="w-full border rounded px-2 py-1">
                                </div>

                                <div class="mb-2">
                                    <label class="block">Valor</label>
                                    <input type="number" step="0.01" name="amount" value="{{ $expense->amount }}"
                                        class="w-full border rounded px-2 py-1">
                                </div>

                                <div class="mb-2">
                                    <label class="block">Categoria</label>
                                    <input type="text" name="category" value="{{ $expense->category }}"
                                        class="w-full border rounded px-2 py-1">
                                </div>

                                <div class="mb-2">
                                    <label class="block">Data</label>
                                    <input type="date" name="spent_at" value="{{ $expense->spent_at }}"
                                        class="w-full border rounded px-2 py-1">
                                </div>

                                <div class="flex justify-end mt-4">
                                    <button type="button" onclick="closeModal('editModal{{ $expense->id }}')"
                                        class="px-4 py-2 mr-2 rounded border">
                                        Cancelar
                                    </button>
                                    <button class="bg-indigo-600 text-white px-4 py-2 rounded">
                                        Atualizar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Modal Excluir -->
                    <div id="deleteModal{{ $expense->id }}"
                        class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                        <div class="bg-white p-6 rounded w-96">
                            <h2 class="text-xl mb-4 font-semibold">Confirmar Exclusão</h2>
                            <p class="mb-4">Deseja realmente excluir <strong>{{ $expense->name }}</strong>?</p>
                            <div class="flex justify-end space-x-2">
                                <button type="button" onclick="closeModal('deleteModal{{ $expense->id }}')"
                                    class="px-4 py-2 mr-2 rounded border">
                                    Cancelar
                                </button>
                                <form method="POST" action="{{ route('expenses.destroy', $expense) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">
                                        Excluir
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Criar -->
    <div id="createModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded w-96">
            <h2 class="text-xl mb-4">Nova Despesa</h2>
            <form method="POST" action="{{ route('expenses.store') }}">
                @csrf

                <div class="mb-2">
                    <label class="block">Nome</label>
                    <input type="text" name="name" class="w-full border rounded px-2 py-1">
                </div>

                <div class="mb-2">
                    <label class="block">Valor</label>
                    <input type="number" step="0.01" name="amount" class="w-full border rounded px-2 py-1">
                </div>

                <div class="mb-2">
                    <label class="block">Categoria</label>
                    <input type="text" name="category" class="w-full border rounded px-2 py-1">
                </div>

                <div class="mb-2">
                    <label class="block">Data</label>
                    <input type="date" name="spent_at" class="w-full border rounded px-2 py-1">
                </div>

                <div class="flex justify-end mt-4">
                    <button type="button" onclick="closeModal('createModal')" class="px-4 py-2 mr-2 rounded border">
                        Cancelar
                    </button>
                    <button class="bg-indigo-600 text-white px-4 py-2 rounded">
                        Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function openModal(id) {
            document.getElementById(id).classList.remove('hidden');
        }

        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
        }
    </script>
@endpush
