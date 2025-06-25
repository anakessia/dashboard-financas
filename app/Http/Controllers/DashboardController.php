<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        
        $gastosPorCategoria = Expense::selectRaw('category, SUM(amount) as total')
            ->groupBy('category')
            ->pluck('total', 'category');

        $totalDespesas = Expense::sum('amount');

        $maiorDespesa = Expense::orderByDesc('amount')->first();
        $maiorValor = $maiorDespesa ? $maiorDespesa->amount : 0;
        $nomeMaiorCategoria = $maiorDespesa ? $maiorDespesa->category : 'Nenhuma';

        $quantidadeCategorias = Expense::distinct('category')->count('category');

        $cotacao = Http::get('https://economia.awesomeapi.com.br/json/last/USD-BRL');
        $usd = $cotacao->successful() ? $cotacao->json()['USDBRL']['bid'] : 'Erro';

        return view('dashboard', [
            'labels' => $gastosPorCategoria->keys(),         
            'data' => $gastosPorCategoria->values(),      
            'usd' => $usd,                                  
            'total' => $totalDespesas,                       
            'maiorValor' => $maiorValor,                     
            'maiorCategoria' => $nomeMaiorCategoria,        
            'categorias' => $quantidadeCategorias
        ]);
    }
}