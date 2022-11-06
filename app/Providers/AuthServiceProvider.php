<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Modules\Banner\Models\Banner;
use Modules\Banner\Policies\BannerPolicy;
use Modules\Brand\Models\Brand;
use Modules\Brand\Policies\BrandPolicy;
use Modules\Cart\Models\Cart;
use Modules\Cart\Policies\CartPolicy;
use Modules\Category\Models\Category;
use Modules\Category\Policies\CategoryPolicy;
use Modules\Coupon\Models\Coupon;
use Modules\Coupon\Policies\CouponPolicy;
use Modules\Message\Models\Message;
use Modules\Message\Policies\MessagePolicy;
use Modules\Order\Models\Order;
use Modules\Order\Policies\OrderPolicy;
use Modules\Post\Models\Post;
use Modules\Post\Policies\PostPolicy;
use Modules\Product\Models\Product;
use Modules\Product\Policies\ProductPolicy;
use Modules\Shipping\Models\Shipping;
use Modules\Shipping\Policies\ShippingPolicy;
use Modules\Size\Models\Size;
use Modules\Size\Policies\SizePolicy;
use Modules\Tag\Models\Tag;
use Modules\Tag\Policies\TagPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Banner::class   => BannerPolicy::class,
        Brand::class    => BrandPolicy::class,
        Cart::class     => CartPolicy::class,
        Category::class => CategoryPolicy::class,
        Coupon::class   => CouponPolicy::class,
        Message::class  => MessagePolicy::class,
        Order::class    => OrderPolicy::class,
        Post::class     => PostPolicy::class,
        Product::class  => ProductPolicy::class,
        Shipping::class => ShippingPolicy::class,
        Size::class     => SizePolicy::class,
        Tag::class      => TagPolicy::class,
    ];
    
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
