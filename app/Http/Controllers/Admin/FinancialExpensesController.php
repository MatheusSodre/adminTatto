<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FinancialExpensesController extends Controller
{
    public function index()
    {
        return view('admin.pages.financial.expenses.index');
    }
}
