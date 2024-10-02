<?php

namespace Database\Factories\Financial;

use App\Models\Financial\PaymentMethod;
use App\Models\Financial\Transaction;
use App\Models\Financial\TransactionPayment;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionPaymentFactory extends Factory
{
    protected $model = TransactionPayment::class;

    public function definition()
    {


        return [
            'transaction_id' => null, // Este será definido posteriormente
            'payment_method_id' => null, // Use um método existente
            'amount' => $this->faker->randomFloat(2, 100, 1000),
            'payment_date' => $this->faker->date,
            'installment_number' => $this->faker->optional()->numberBetween(1, 12),
            'status' => $this->faker->randomElement(['paid', 'pending']),
        ];
    }
}
