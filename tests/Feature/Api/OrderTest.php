<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Testing\TestResponse;
use Modules\Coupon\Models\Coupon;
use Modules\Shipping\Models\Shipping;
use Tests\Feature\CoreTest;

class OrderTest extends CoreTest
{
    public string $url = '/api/v1/order/';
    public $model = Coupon::class;
    
    use WithFaker;
    
    /**
     * test create product.
     *
     * @return TestResponse
     */
    public function test_create_order(): TestResponse
    {
        $token = $this->authenticate();
        
        $data = [
            'order_number' => $this->faker->unique()->numberBetween(1, 9999),
            'sub_total'    => $this->faker->numberBetween(1, 500),
            'coupon'       => $this->faker->numberBetween(1, 5),
            'total_amount' => $this->faker->numberBetween(1, 500),
            'quantity'     => $this->faker->numberBetween(1, 500),
            'first_name'   => $this->faker->firstName,
            'last_name'    => $this->faker->lastName,
            'email'        => $this->faker->unique()->safeEmail,
            'phone'        => $this->faker->phoneNumber,
            'country'      => $this->faker->country,
            'post_code'    => $this->faker->word,
            'address1'     => $this->faker->address,
            'address2'     => $this->faker->address,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
            'user_id'     => Auth::id(),
            'shipping_id' => function () {
                return Shipping::factory()->create()->id;
            },
        ];
        
        return $this->create($this->url, $token, $data);
    }
    
    /**
     * test update product.
     *
     * @return TestResponse
     */
    public function test_update_order(): TestResponse
    {
        $token = $this->authenticate();
        $data  = [
            'status'   => 'process',
        ];
    
        $id = (int)$this->model::firstOrFail()->id;
        return $this->updatePUT($this->url, $token, $data, $id);
    }
    
    /**
     * test find product.
     *
     * @return TestResponse
     */
    public function test_find_order(): TestResponse
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
    public function test_get_all_order(): TestResponse
    {
        $token = $this->authenticate();
        
        return $this->list($this->url, $token);
    }
    
    /**
     * test delete products.
     *
     * @return TestResponse
     */
    public function test_delete_order(): TestResponse
    {
        $token = $this->authenticate();
        $id    = $this->model::firstOrFail()->id;
        
        return $this->destroy($this->url, $token, $id);
    }
}
