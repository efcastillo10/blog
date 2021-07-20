<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url' => 'posts/' . $this->faker->image('public/storage/posts', 640, 480, null, false) // posts/images.jpg
        ];
    }
}
//https://www.youtube.com/watch?v=eC8rDAiT1OM&list=PLZ2ovOgdI-kX3XFj77zlvSQYhJyJSYQWr&index=4