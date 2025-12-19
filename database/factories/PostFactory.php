<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Psy\Util\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(rand(5, 10));
        
        // Randomly set published_at date: 80% chance of being set (published or scheduled)
        $published_at = $this->faker->boolean(80) ? $this->faker->dateTimeBetween('-1 year', '+1 month') : null;
        
        // Determine is_published status based on published_at
        // If published_at is set, the post is "intended" to be published (true).
        $is_published = $published_at !== null; 

        return [
            // Ensure foreign keys exist by picking a random ID from the related tables
            'admin_id' => Admin::inRandomOrder()->first()->id ?? Admin::factory(), 
            'category_id' => Category::inRandomOrder()->first()->id ?? Category::factory(),
            
            'title' => $title,
            'slug' => rand(),
            
            // Generate a large paragraph of HTML content (good for TinyMCE)
            'content' => '<p>' . implode('</p><p>', $this->faker->paragraphs(rand(5, 15))) . '</p>',
            
            // Generate a shorter summary
            'excerpt' => $this->faker->paragraph(3),
            
            // Placeholder image
            'image_url' => 'https://placehold.co/800x400/3498db/FFFFFF?text=' . rand(),
            
            'published_at' => $published_at,
            'is_published' => $is_published,
        ];
    }

    /**
     * State transformation to explicitly make a post a Draft.
     * If published_at is null, the post is a draft.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function draft(): Factory
    {
        return $this->state(fn (array $attributes) => [
            'published_at' => null,
            'is_published' => false,
        ]);
    }

    /**
     * State transformation to explicitly make a post Scheduled (published in the future).
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function scheduled(): Factory
    {
        return $this->state(fn (array $attributes) => [
            'published_at' => Carbon::now()->addDays(rand(1, 30)),
            'is_published' => true,
        ]);
    }
}
