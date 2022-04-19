<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Course;
use App\Models\Level;
use App\Models\Price;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence();

        return [
            "title"=>$title,
            "subtitle"=>$this->faker->sentence(),
            "description"=>$this->faker->paragraph(),
            "status"=>$this->faker->randomElement([Course::BORRADOR,Course::REVISION,Course::PUBLICADO]),
            "slug"=> Str::slug($title),
            "user_id"=>$this->faker->randomElement([1,2,3]),
            "level_id"=>Level::all()->random()->id,
            "category_id"=>Category::all()->random()->id,
            "price_id"=>Price::all()->random()->id,
        ];
    }
}
