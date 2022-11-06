<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\TestResponse;
use Modules\Coupon\Models\Coupon;
use Tests\Feature\CoreTest;

class NewsletterTest extends CoreTest
{
    public string $url = '/api/v1/newsletter/';
    public $model = Coupon::class;
    
    use WithFaker;
    
    /**
     * test create product.
     *
     * @return TestResponse
     */
    public function test_create_newsletter(): TestResponse
    {
        $token = $this->authenticate();
        
        $data = [
            'email'   => $this->faker->unique()->safeEmail,
        ];
        
        return $this->create($this->url, $token, $data);
    }
    
    /**
     * test update product.
     *
     * @return TestResponse
     */
    public function test_update_newsletter(): TestResponse
    {
        $token = $this->authenticate();
        $data  = [
            'email'   => $this->faker->unique()->safeEmail,
        ];
        
        $id = $this->model::firstOrFail()->id;
        
        return $this->updatePUT($this->url, $token, $data, $id);
    }
    
    /**
     * test find product.
     *
     * @return TestResponse
     */
    public function test_find_newsletter(): TestResponse
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
    public function test_get_all_newsletter(): TestResponse
    {
        $token = $this->authenticate();
        
        return $this->list($this->url, $token);
    }
    
    /**
     * test delete products.
     *
     * @return TestResponse
     */
    public function test_delete_newsletter(): TestResponse
    {
        $token = $this->authenticate();
        $id    = $this->model::firstOrFail()->id;
        
        return $this->destroy($this->url, $token, $id);
    }
}
