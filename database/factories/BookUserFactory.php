<?php

namespace Database\Factories;

use App\Models\BookUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BookUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status' => 'loan_requested'
        ];
    }
}
