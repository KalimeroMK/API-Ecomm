<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Testing\TestResponse;
use Modules\Product\Models\Product;
use Tests\Feature\CoreTest;

class ProductTest extends CoreTest
{
    public string $url = '/api/v1/product/';
    public $model = Product::class;

    use WithFaker;

    /**
     * test create product.
     *
     * @return TestResponse
     */
    public function test_create_product(): TestResponse
    {
        $token = $this->authenticate();
        Storage::fake('uploads');

        $data = [
            'title'        => $this->faker->unique(true)->word,
            'color'        => $this->faker->unique(true)->word,
            'summary'      => $this->faker->text,
            'description'  => $this->faker->text,
            'condition_id' => $this->faker->numberBetween(1, 2),
            'photo'        => UploadedFile::fake()->image('file.png', 600, 600),
            'stock'        => 100,
            'price'        => $this->faker->numberBetween(1, 9999),
            'discount'     => 10,
            'is_featured'  => true,
            'status'       => 'active',
            'brand_id'     => $this->faker->numberBetween(1, 10),
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ];

        return $this->create($this->url, $token, $data);
    }

    /**
     * test update product.
     *
     * @return TestResponse
     */
    public function test_update_product(): TestResponse
    {
        $token = $this->authenticate();
        $data = [
            'title'        => $this->faker->unique(true)->word,
            'summary'      => $this->faker->text,
            'description'  => $this->faker->text,
            'color'        => $this->faker->unique(true)->word,
            'size'         => 1,
            'condition_id' => $this->faker->numberBetween(1, 2),
            'photo'        => UploadedFile::fake()->image('file.png', 600, 600),
            'stock'        => 100,
            'price'        => $this->faker->numberBetween(1, 9999),
            'discount'     => 10,
            'is_featured'  => true,
            'status'       => 'active',
            'brand_id'     => $this->faker->numberBetween(1, 10),
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ];

        $id = (int)$this->model::firstOrFail()->id;
        return $this->update($this->url, $token, $data, $id);
    }

    /**
     * test find product.
     *
     * @return TestResponse
     */
    public function test_find_product(): TestResponse
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
    public function test_get_all_product(): TestResponse
    {
        $token = $this->authenticate();

        return $this->list($this->url, $token);
    }

    /**
     * test delete products.
     *
     * @return TestResponse
     */
    public function test_delete_product(): TestResponse
    {
        $token = $this->authenticate();
        $id    = $this->model::firstOrFail()->id;

        return $this->destroy($this->url, $token, $id);
    }
}
