<?php

namespace App\Services\Admin\Financial;

use App\Models\Financial\PaymentCondition;
use App\Models\Financial\Transaction;
use App\Models\Financial\TransactionPayment;
use App\Repositories\Admin\Financial\PaymentConditionRepository;
use App\Repositories\Admin\Financial\TransactionPaymentRepository;
use App\Repositories\Admin\Financial\TransactionRepository;



class TransactionService
{
    /**
     * Create a new service instance.
     *
     * @param  TransactionRepository $transactionRepository
     * @return void
     */

    private $paymentCondiction;
    private $transaction;
    public function __construct(
        private TransactionRepository $transactionRepository,
        private TransactionPaymentRepository $transactionPaymentRepository,
        private PaymentConditionRepository $paymentConditionRepository
        )
    {
        $this->transactionRepository = $transactionRepository;
        $this->transactionPaymentRepository = $transactionPaymentRepository;
        $this->paymentConditionRepository = $paymentConditionRepository;
    }

    public function store(array $data)
    {
        $this->paymentCondiction =  $this->createPaymentCondition($data);
        $this->transaction =  $this->createTransaction($data);
        switch ($data['payment_conditions']) {
            case 'cash':
                    $this->createTransactionPaymentCash($data);
                break;
            case 'paymentInstallments':
                    $this->createTransactionPaymentInstallments($data);
                break;
            case 'downPaymentInstallments':
                    $this->createTransactionPaymentDowInstallments($data);
                break;
        }
    }

    public function createPaymentCondition(array $data): PaymentCondition
    {

        $paymentCondition = [
            'type'         => $data['payment_conditions'],
            'installments' => $data['installment'] ?? null,
            'down_payment' => $this->convertToDatabaseFormat($data['amount']) ?? null,
        ];
        return $this->paymentConditionRepository->create($paymentCondition);
    }

    public function createTransaction(array $data): Transaction
    {
        $transaction = [
            'type'                 => $data['type'],
            'amount'               => $this->convertToDatabaseFormat($data['amount']),
            'description'          => $data['description'],
            'transaction_date'     => $data['transaction_date'],
            'due_date'             => $data['due_date'],
            'category_id'          => $data['category_id'],
            'client_id'            => $data['client_id'],
            'payment_condition_id' => $this->paymentCondiction->id,
        ];

        return $this->transactionRepository->create($transaction);
    }

    public function createTransactionPaymentCash(array $data)
    {
        $transactonPayment = [
            'transaction_id'    => $this->transaction->id,
            'payment_method_id' => $data['payment_method_cash'],
            'amount'            => $this->convertToDatabaseFormat($data['amount']),
            'payment_date'      => now(),
            'status'            => 'paid',
        ];

        $this->transactionPaymentRepository->create($transactonPayment);
    }

    public function createTransactionPaymentInstallments(array $data)
    {
        $installmentAmount = $this->convertToDatabaseFormat($data['amount']) / $data['installment'];
        for ($i = 1; $i <= $data['installment']; $i++) {
            $this->transactionPaymentRepository->create([
                'transaction_id'     => $this->transaction->id,
                'payment_method_id'  => $data['payment_method_installment'],
                'amount'             => $installmentAmount,
                'payment_date'       => now()->addMonths($i),
                'installment_number' => $i,
                'status'             => 'pending',
            ]);
        }
    }

    public function createTransactionPaymentDowInstallments(array $data)
    {
        $this->transactionPaymentRepository->create([
            'transaction_id'     => $this->transaction->id,
            'payment_method_id'  => $data['payment_method_down_payment'],
            'amount'             => $this->convertToDatabaseFormat($data['down_payment']),
            'payment_date'       => now(),
            'installment_number' => 1,
            'status'             => 'pending',
        ]);

        $remainingAmount = $this->convertToDatabaseFormat($data['amount']) - $this->convertToDatabaseFormat($data['down_payment']);
        $installmentAmount = $remainingAmount / $data['installment_number'];

        for ($i = 1; $i <= $data['installment_number']; $i++) {
            $this->transactionPaymentRepository->create([
                'transaction_id' => $this->transaction->id,
                'payment_method_id' => $data['payment_method_down_payment_installment'],
                'amount' => $installmentAmount,
                'payment_date' => now()->addMonths($i),
                'installment_number' => $i + 1,
                'status' => 'pending',
            ]);
        }
    }

    /**
     * Convert input value from '1.000,00' to '1000.00' for database storage.
     *
     * @param string|null $value
     * @return string|null
     */
    private function convertToDatabaseFormat($value)
    {
        if ($value) {
            // Remove pontos de milhares e substituir vírgula por ponto decimal
            return str_replace(['.', ','], ['', '.'], $value);
        }
        return null;
    }

    public function all()
    {
        return $this->transactionRepository->all();
    }

    public function paginate(array $relations = [],array $condition = [], array $columns = ['*'], int $limit = 10)
    {
        return $this->transactionRepository->paginate($relations , $condition,  $columns ,  $limit );
    }

    public function getById($id)
    {
        return $this->transactionRepository->findOrFail($id);
    }

    public function update($request,$id):bool|null
    {
        return $this->transactionRepository->update($request,$id);
    }

    public function destroy($id):bool|null
    {
        return $this->transactionRepository->delete($id);
    }

    public function search($resquet)
    {
        return $this->transactionRepository->search($resquet);
    }
}
