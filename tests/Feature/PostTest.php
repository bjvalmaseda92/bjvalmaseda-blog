<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Str;

class PostTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function can_create_post()
    {
        $this->withExceptionHandling();
        $this->get(route("post.create"))->assertStatus(200);
        $this->post(
            route("post.store", [
                "title" => "Title Post",
                "body" => "Body text",
                "image" => "image.jpg",
                "tags" => ["tag1", "tag2", "tag3"],
            ])
        )->assertRedirect(route("post.index"));

        $this->assertDatabaseHas("posts", [
            "title" => "Title Post",
            "body" => "Body text",
            "slug" => Str::slug("Title Post"),
            "image" => "image.jpg",
        ]);
        $post = Post::whereSlug(Str::slug("Title Post"))->firstOrFail();
        $this->assertEquals(3, $post->tags()->count());
    }

    /** @test */
    public function can_update_post()
    {
        $this->withExceptionHandling();
        $post = Post::factory()->create();
        $this->get(route("post.edit", $post))->assertStatus(200);
        $this->patch(route("post.update", $post), [
            "title" => "Title update",
            "body" => "Body Update",
        ])->assertRedirect(route("post.edit", $post));

        $this->assertDatabaseHas("posts", [
            "title" => "Title update",
            "body" => "Body Update",
            "slug" => Str::slug("Title update"),
        ]);
    }

    /** @test */
    public function test_function()
    {
        $this->withExceptionHandling();

        $post = Post::factory()->create();

        $this->delete(route("post.destroy", $post))->assertRedirect(
            route("post.index")
        );
        $this->assertDatabaseCount("posts", 0);
    }
}
