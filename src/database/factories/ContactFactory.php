<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

// お問い合わせファクトリ
class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => $this->faker->numberBetween(1, 5),
            'first_name' => $this->faker->name,
            'last_name' => $this->faker->name,
            'gender' => $this->faker->numberBetween(1, 3),
            'email' => $this->faker->safeEmail(),
            'tell' => $this->faker->numberBetween(1000000000, 99999999999),
            'address' => $this->faker->city(),
            'building' => $this->faker->city(),
            'detail' => $this->faker->sentence()
        ];
    }
}
