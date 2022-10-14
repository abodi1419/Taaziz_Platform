<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'title'=>$this->faker->sentence(4),
            'content'=>$this->faker->paragraph(60, false),
            'user_id'=>User::all()->random()->id,
            'image' => 'https://picsum.photos/'.random_int(100,600).'/'.random_int(100,400).'?random='.random_int(1,100),
        ];
    }
}
