<?php

namespace Tests\Unit;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tests\TestCase;

class PostTest extends TestCase
{
    use HasFactory;

    public function test_can_create_post()
    {
        $data = [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
        ];

        $this->post(route('posts.store'), $data)
            ->assertStatus(201)
            ->assertJson($data);
    }

    public function test_can_update_post()
    {
        $post = Post::factory()->create();

        $data = [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph
        ];

        $this->put(route('posts.update', $post), $data)
            ->assertStatus(200)
            ->assertJson($data);
    }

    public function test_can_show_post()
    {
        $post = Post::factory()->create();

        $this->get( route('posts.show', $post) )
            ->assertStatus(200);
    }

    public function test_can_delete_post()
    {
        $post = Post::factory()->create();

        $this->delete(route('posts.delete', $post))
            ->assertStatus(204);
    }

    public function test_can_list_posts()
    {
        Post::truncate();
        $posts = Post::factory()->count(5)->create()->map(function ($post) {
            return $post->only(['id', 'title', 'content']);
        });

        $this->get(route('posts'))
            ->assertStatus(200)
            ->assertJson($posts->toArray())
            ->assertJsonStructure([
                '*' => [ 'id', 'title', 'content' ],
            ]);
    }
}
