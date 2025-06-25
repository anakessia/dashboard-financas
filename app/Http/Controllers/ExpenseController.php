<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::orderBy('spent_at', 'desc')->get();
        return view('expenses.index', compact('expenses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required|numeric',
            'category' => 'required',
            'spent_at' => 'required|date',
        ]);

        Expense::create($request->all());
        return redirect()->route('expenses.index')->with('success', 'Despesa criada com sucesso!');
    }

    public function update(Request $request, Expense $expense)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required|numeric',
            'category' => 'required',
            'spent_at' => 'required|date',
        ]);

        $expense->update($request->all());
        return redirect()->route('expenses.index')->with('success', 'Despesa atualizada com sucesso!');
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()->route('expenses.index')->with('success', 'Despesa excluída com sucesso!');
    }
}
