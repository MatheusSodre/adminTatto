<?php

namespace Database\Factories\Financial;

use App\Models\Financial\PaymentCondition;
use App\Models\Financial\Transaction;
use App\Models\Financial\TransactionPayment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;
    protected $paymentCondition;

    public function definition()
    {
        $paymentCondition = PaymentCondition::factory()->create();
        $amount = $this->faker->randomFloat(2, 100, 1000);

        $dateDual = $this->faker->dateTimeBetween('now', '+1 years')->format('Y-m-d');
        $status = 'paid';
        if ($paymentCondition->type === 'downPaymentInstallments') {
            $amount += $paymentCondition->down_payment;
            $dateDual = Carbon::parse($dateDual)->addMonths($paymentCondition->installments)->format('Y-m-d');
            $status = 'pending';
        }
        if ($paymentCondition->type === 'PaymentInstallments') {
            $dateDual = Carbon::parse($dateDual)->addMonths($paymentCondition->installments)->format('Y-m-d');
            $status = 'pending';
        }
        return [
            'type' => $this->faker->randomElement(['expense', 'receivable']),
            'amount' => $amount,
            'description' => $this->faker->sentence,
            'transaction_date' => $this->faker->dateTimeBetween('-2 months', 'now')->format('Y-m-d'),
            'due_date' => $dateDual,
            'category_id' => $this->faker->randomElement([1, 2, 3]),
            'client_id' => $this->faker->randomElement([1, 2, 3]),
            'payment_condition_id' => $paymentCondition->id,
            'status' => $status,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Transaction $transaction) {

            $paymentCondition = PaymentCondition::find($transaction->payment_condition_id);
            switch ($paymentCondition->type) {
                case 'cash':
                    TransactionPayment::factory()->create([
                        'transaction_id' => $transaction->id,
                        'payment_method_id' => $this->faker->randomElement([1, 2, 3]),
                        'amount' => $transaction->amount,
                        'payment_date' => $transaction->due_date,
                        'status' => 'paid',
                    ]);
                    break;

                case 'paymentInstallments':
                    $installmentAmount = $transaction->amount / $paymentCondition->installments;
                    $paymentMethod = $this->faker->randomElement([1, 2, 3]);
                    for ($i = 1; $i <= $paymentCondition->installments; $i++) {
                        TransactionPayment::factory()->create([
                            'transaction_id' => $transaction->id,
                            'payment_method_id' => $paymentMethod,
                            'amount' => $installmentAmount,
                            'payment_date' => Carbon::parse($transaction->due_date)->addMonths($i),
                            'installment_number' => $i,
                            'status' => 'pending',
                        ]);
                    }
                    break;

                case 'downPaymentInstallments':
                    $downPaymentAmount = $paymentCondition->down_payment;
                    TransactionPayment::factory()->create([
                        'transaction_id' => $transaction->id,
                        'payment_method_id' => $this->faker->randomElement([1, 2, 3]),
                        'amount' => $downPaymentAmount,
                        'payment_date' => $transaction->due_date,
                        'installment_number' => 1,
                        'status' => 'paid',
                    ]);

                    $remainingAmount = $transaction->amount - $downPaymentAmount;
                    $installmentAmount = $remainingAmount / $paymentCondition->installments;
                    $paymentMethod = $this->faker->randomElement([1, 2, 3]);
                    for ($i = 1; $i <= $paymentCondition->installments; $i++) {
                        TransactionPayment::factory()->create([
                            'transaction_id' => $transaction->id,
                            'payment_method_id' => $paymentMethod,
                            'amount' => $installmentAmount,
                            'payment_date' => Carbon::parse($transaction->due_date)->addMonths($i),
                            'installment_number' => $i + 1,
                            'status' => 'pending',
                        ]);
                    }
                    break;
            }
        });
    }
}
