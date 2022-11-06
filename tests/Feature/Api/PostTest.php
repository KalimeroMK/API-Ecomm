<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Testing\TestResponse;
use Modules\Post\Models\Post;
use Tests\Feature\CoreTest;

class PostTest extends CoreTest
{
    public string $url = '/api/v1/post/';
    public $model = Post::class;

    use WithFaker;

    /**
     * test create product.
     *
     * @return TestResponse
     */
    public function test_create_post(): TestResponse
    {
        $token = $this->authenticate();
        Storage::fake('uploads');

        $data = [
            'title'       => $this->faker->word,
            'slug'        => $this->faker->slug,
            'status'      => 'active',
            'summary'     => $this->faker->text,
            'category[]'  => [1,2,3,4],
            'photo'       => UploadedFile::fake()->image('file.png', 600, 600),
            'description' => $this->faker->text,
            'quote'       => $this->faker->word,
            'tags'        => $this->faker->word,
            'added_by'    => $this->faker->numberBetween(1, 3),
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ];

        return $this->create($this->url, $token, $data);
    }

    ///**
    // * test update product.
    // *
    // * @return TestResponse
    // */
    //public function test_update_post(): TestResponse
    //{
    //    $token = $this->authenticate();
    //    $data = [
    //        'title'       => $this->faker->word,
    //        'slug'        => $this->faker->slug,
    //        'summary'     => $this->faker->text,
    //        'description' => $this->faker->text,
    //        'status'      => 'active',
    //        'quote'       => $this->faker->word,
    //        'photo'       => UploadedFile::fake()->image('file.png', 600, 600),
    //        'tags'        => $this->faker->word,
    //        'added_by'    => $this->faker->numberBetween(1, 3),
    //        'created_at'  => Carbon::now(),
    //        'updated_at'  => Carbon::now(),
    //    ];
    //
    //    $id = (int)$this->model::firstOrFail()->id;
    //    return $this->update($this->url, $token, $data, $id);
    //}

    /**
     * test find product.
     *
     * @return TestResponse
     */
    public function test_find_post(): TestResponse
    {
        $token = $this->authenticate();
        $id    = $this->model::firstOrFail()->id;

        return $this->show($this->url, $token, $id);
    }

    /**
     * test get all products.
     *
     * @return TestResponse
     */
    public function test_get_all_post(): TestResponse
    {
        $token = $this->authenticate();

        return $this->list($this->url, $token);
    }

    /**
     * test delete products.
     *
     * @return TestResponse
     */
    public function test_delete_post(): TestResponse
    {
        $token = $this->authenticate();
        $id    = $this->model::firstOrFail()->id;

        return $this->destroy($this->url, $token, $id);
    }
}
