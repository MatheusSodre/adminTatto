<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUpdateTransaction;
use App\Models\Admin\Client;
use App\Models\Financial\{CategoriesPayment,Transaction,TransactionPayment,PaymentCondition,PaymentMethod};
use App\Services\Admin\Financial\TransactionService;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function __construct(private TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }
    public function index()
    {
        $transaction =  $this->transactionService->paginate(['client','category','paymentCondition','transactionPayments.paymentMethod','recurringTransaction']);
        return view('admin.pages.financial.transaction.index',compact('transaction'));
    }

    public function create($type)
    {
        $categories = CategoriesPayment::where('type',$type)->get();
        $clients = Client::all();
        $paymentConditions = PaymentCondition::all();
        $paymentMethods = PaymentMethod::all();

        return view('admin.pages.financial.transaction.create',compact('type','categories', 'clients', 'paymentConditions','paymentMethods'));
    }

    public function store(StoreUpdateTransaction $request)
    {
        $this->transactionService->store($request->all());
        return redirect()->route('financial.transactions.index')->with('success', 'Transação criada com sucesso!');
    }
}
