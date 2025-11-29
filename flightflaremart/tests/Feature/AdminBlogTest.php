<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminBlogTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_see_drafts_page(): void
    {
        $admin = Admin::factory()->create();
        $draftPost = Post::factory()->draft()->create();

        $response = $this->actingAs($admin, 'admin')->get(route('admin.blog.posts.drafts'));

        $response->assertStatus(200);
        $response->assertSee($draftPost->title);
    }
}
