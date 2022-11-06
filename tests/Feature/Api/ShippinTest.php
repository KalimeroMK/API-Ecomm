<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Testing\TestResponse;
use Modules\Shipping\Models\Shipping;
use Tests\Feature\CoreTest;

class ShippinTest extends CoreTest
{
    public string $url = '/api/v1/shipping/';
    public $model = Shipping::class;

    use WithFaker;

    /**
     * test create product.
     *
     * @return TestResponse
     */
    public function test_create_shipping(): TestResponse
    {
        $token = $this->authenticate();
        Storage::fake('uploads');

        $data = [
             'type'       => Carbon::now().$this->faker->unique()->word,
             'price'      => $this->faker->numberBetween(1, 100),
             'status'     =>'active',
             'created_at' => Carbon::now(),
             'updated_at' => Carbon::now(),
        ];

        return $this->create($this->url, $token, $data);
    }

    /**
     * test update product.
     *
     * @return TestResponse
     */
    public function test_update_shipping(): TestResponse
    {
        $token = $this->authenticate();
        $data = [
             'type'       => Carbon::now().$this->faker->unique()->word,
             'price'      => $this->faker->numberBetween(1, 100),
             'status'     =>'active',
             'created_at' => Carbon::now(),
             'updated_at' => Carbon::now(),
        ];

        $id = (int)$this->model::firstOrFail()->id;
        return $this->updatePUT($this->url, $token, $data, $id);
    }

    /**
     * test find product.
     *
     * @return TestResponse
     */
    public function test_find_shipping(): TestResponse
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
    public function test_get_all_shipping(): TestResponse
    {
        $token = $this->authenticate();

        return $this->list($this->url, $token);
    }

    /**
     * test delete products.
     *
     * @return TestResponse
     */
    public function test_delete_shipping(): TestResponse
    {
        $token = $this->authenticate();
        $id    = $this->model::firstOrFail()->id;

        return $this->destroy($this->url, $token, $id);
    }
}
