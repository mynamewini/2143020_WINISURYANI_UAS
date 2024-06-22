<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\Income;
use Illuminate\Http\Request;

class OperatorMoneyController extends Controller
{
    public function index()
    {
        $title = 'Pendapatan';

        // Tampilkan data pemasukan berdasarkan created_at terbaru
        $incomes = Income::orderBy('created_at', 'DESC')->get();

        // Total Pemasukan
        $totalIncome = Income::sum('amount');

        return view('operator.incomes.index', compact('title', 'incomes', 'totalIncome'));
    }
}
