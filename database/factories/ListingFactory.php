<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle(),
            'tags' => $this->tags(mt_rand(1,8)) . ',' . $this->tags(mt_rand(1,8)),
            'location' => $this->faker->country(),
            'email' => $this->faker->unique()->safeEmail(),
            'website' => $this->faker->url(),
            'description' => $this->faker->text(), 
            'company_id' => mt_rand(231,331), 
            'user_id' => mt_rand(103,203), 
        ];
    }

    public function tags($number){
        $tagName = '';

        switch ($number){
            case 1:
                $tagName = 'Junior';
                break;
            case 2:
                $tagName = 'Middle';
                break;
            case 3:
                $tagName = 'Senior';
                break;
            case 4:
                $tagName = 'Part-Time';
                break;
            case 5:
                $tagName = 'Full Time';
                break;
            case 6:
                $tagName = 'Remote';
                break;
            case 7:
                $tagName = 'Hybrid';
                break;
            case 8:
                $tagName = 'Transport Included';
                break;
        }

        return $tagName;
    }
}
