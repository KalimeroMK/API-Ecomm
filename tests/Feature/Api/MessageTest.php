<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\TestResponse;
use Modules\Coupon\Models\Coupon;
use Tests\Feature\CoreTest;

class MessageTest extends CoreTest
{
    public string $url = '/api/v1/message/';
    public $model = Coupon::class;
    
    use WithFaker;
    
    /**
     * test create product.
     *
     * @return TestResponse
     */
    public function test_create_message(): TestResponse
    {
        $token = $this->authenticate();
        
        $data = [
            'name'    => $this->faker->name,
            'subject' => $this->faker->word,
            'email'   => $this->faker->unique()->safeEmail,
            'photo'   => $this->faker->word,
            'phone'   => $this->faker->phoneNumber,
            'message' => $this->faker->sentence,
            'read_at' => $this->faker->time,
        ];
        
        return $this->create($this->url, $token, $data);
    }
    
    /**
     * test update product.
     *
     * @return TestResponse
     */
    public function test_update_message(): TestResponse
    {
        $token = $this->authenticate();
        $data  = [
            'name'    => $this->faker->name,
            'subject' => $this->faker->word,
            'email'   => $this->faker->unique()->safeEmail,
            'phone'   => $this->faker->phoneNumber,
            'message' => $this->faker->sentence,
            'read_at' => $this->faker->time,
        ];
        
        $id = $this->model::firstOrFail()->id;
        
        return $this->updatePUT($this->url, $token, $data, $id);
    }
    
    /**
     * test find product.
     *
     * @return TestResponse
     */
    public function test_find_message(): TestResponse
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
    public function test_get_all_message(): TestResponse
    {
        $token = $this->authenticate();
        
        return $this->list($this->url, $token);
    }
    
    /**
     * test delete products.
     *
     * @return TestResponse
     */
    public function test_delete_message(): TestResponse
    {
        $token = $this->authenticate();
        $id    = $this->model::firstOrFail()->id;
        
        return $this->destroy($this->url, $token, $id);
    }
}
