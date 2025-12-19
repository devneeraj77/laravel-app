<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;
use App\Models\ImageAsset;
use App\Models\Category;
use App\Jobs\PingSearchEngines;
use Illuminate\Support\Facades\Queue;

class SitemapTest extends TestCase
{
    use RefreshDatabase;

    public function test_sitemap_is_generated_successfully()
    {
        // Create a dummy category
        $category = Category::factory()->create([
            'name' => 'Test Category',
            'slug' => 'test-category',
        ]);

        // Create a dummy post
        $post = Post::factory()->create([
            'title' => 'Test Post',
            'slug' => 'test-post',
            'is_published' => true,
            'published_at' => now(),
            'excerpt' => 'Test excerpt',
            'category_id' => $category->id,
        ]);

        $imageAsset = ImageAsset::factory()->create([
            'post_id' => $post->id,
            'image_url' => 'http://res.cloudinary.com/demo/image/upload/v157227demo/sample.jpg'
        ]);

        // Access the sitemap URL
        $response = $this->get('/sitemap.xml');

        // Assert that the response is successful
        $response->assertStatus(200);

        // Assert that the response has the correct content type
        $response->assertHeader('Content-Type', 'text/xml');

        // Assert that the sitemap contains the dummy category
        $response->assertSee('<loc>' . url('/blog/test-category') . '</loc>', false);

        // Assert that the sitemap contains the dummy post with category slug
        $response->assertSee('<loc>' . url('/blog/test-category/test-post') . '</loc>', false);

        // Assert that the sitemap contains the image sitemap
        $response->assertSee('<image:image>', false);
        $response->assertSee('<image:loc>' . $imageAsset->image_url . '</image:loc>', false);
        $response->assertSee('<image:title>' . $post->title . '</image:title>', false);
        $response->assertSee('<image:caption>' . $post->excerpt . '</image:caption>', false);
    }

    public function test_sitemap_only_includes_published_posts()
    {
        // Create a dummy category
        $category = Category::factory()->create([
            'name' => 'Published Category',
            'slug' => 'published-category',
        ]);

        // Create a published post
        Post::factory()->create([
            'title' => 'Published Post',
            'slug' => 'published-post',
            'is_published' => true,
            'published_at' => now(),
            'category_id' => $category->id,
        ]);

        // Create a draft post
        Post::factory()->create([
            'title' => 'Draft Post',
            'slug' => 'draft-post',
            'is_published' => false,
            'published_at' => null,
            'category_id' => $category->id,
        ]);

        // Access the sitemap URL
        $response = $this->get('/sitemap.xml');

        // Assert that the response is successful
        $response->assertStatus(200);

        // Assert that the sitemap contains the published post
        $response->assertSee('<loc>' . url('/blog/published-category/published-post') . '</loc>', false);

        // Assert that the sitemap does not contain the draft post
        $response->assertDontSee('<loc>' . url('/blog/published-category/draft-post') . '</loc>', false);
    }

    public function test_ping_search_engines_job_is_dispatched_when_post_is_published()
    {
        Queue::fake();

        // Create a category
        $category = Category::factory()->create();

        // Create a post
        $post = Post::factory()->create([
            'is_published' => false,
            'category_id' => $category->id,
        ]);

        // Publish the post
        $this->post(route('admin.blog.posts.toggle-publish', $post));

        // Assert that the job was dispatched
        Queue::assertPushed(PingSearchEngines::class);
    }

    public function test_robots_txt_is_accessible_and_contains_correct_content()
    {
        $response = $this->get('/robots.txt');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/plain; charset=UTF-8');
        $response->assertSee('User-agent: *');
        $response->assertSee('Disallow: /admin/');
        $response->assertSee('Sitemap: http://localhost:8000/sitemap.xml');
    }
}
