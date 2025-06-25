<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class ReportController extends Controller
{
    public function index()
    {
        $expenses = Expense::orderBy('spent_at', 'desc')->get();
        return view('reports.index', compact('expenses'));
    }

    // Gera PDF com todas as despesas
    public function generatePDF()
    {
        $expenses = Expense::orderBy('spent_at', 'desc')->get();
        $pdf = Pdf::loadView('reports.pdf', compact('expenses'));

        return $pdf->download('relatorio-despesas.pdf');
    }

    // Gera PDF apenas com as despesas do mês atual
    public function monthly()
    {
        $expenses = Expense::whereMonth('spent_at', now()->month)
                       ->whereYear('spent_at', now()->year)
                       ->orderBy('spent_at', 'desc')
                       ->get();

        $total = $expenses->sum('amount');

        $pdf = Pdf::loadView('reports.pdf', compact('expenses', 'total'))
              ->setPaper('a4', 'portrait');

        return $pdf->download('relatorio-mensal.pdf');
    }
}
