<?php

namespace Database\Factories\Financial;

use App\Models\Financial\PaymentCondition;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentConditionFactory extends Factory
{
    protected $model = PaymentCondition::class;

    public function definition()
    {

        $type  = $this->faker->randomElement(['cash', 'paymentInstallments', 'downPaymentInstallments']);

        switch ($type) {
            case 'cash':
                return [
                    'type' => $type,
                ];
                break;
            case 'paymentInstallments':
                return [
                    'type' => $type,
                    'installments' => $this->faker->numberBetween(1, 12),
                ];
                break;
            case 'downPaymentInstallments':
                return [
                    'type' => $type,
                    'installments' => $this->faker->numberBetween(1, 12),
                    'down_payment' => $this->faker->randomFloat(2, 100, 1000),
                ];
        }
    }
}
