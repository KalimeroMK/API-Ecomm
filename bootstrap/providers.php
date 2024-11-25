<?php

use Modules\Attribute\Providers\AttributeServiceProvider;
use Modules\Auth\Providers\AuthServiceProvider;
use Modules\Banner\Providers\BannerServiceProvider;
use Modules\Billing\Providers\BillingServiceProvider;
use Modules\Brand\Providers\BrandServiceProvider;
use Modules\Bundle\Providers\BundleServiceProvider;
use Modules\Cart\Providers\CartServiceProvider;
use Modules\Category\Providers\CategoryServiceProvider;
use Modules\Core\Providers\CoreServiceProvider;
use Modules\Coupon\Providers\CouponServiceProvider;
use Modules\Front\Providers\FrontServiceProvider;
use Modules\Google2fa\Providers\Google2faServiceProvider;
use Modules\Message\Providers\MessageServiceProvider;
use Modules\Newsletter\Providers\NewsletterServiceProvider;
use Modules\Notification\Providers\NotificationServiceProvider;
use Modules\OpenAI\Providers\OpenAIServiceProvider;
use Modules\Order\Providers\OrderServiceProvider;
use Modules\Page\Providers\PageServiceProvider;
use Modules\Permission\Providers\PermissionServiceProvider;
use Modules\Post\Providers\PostServiceProvider;
use Modules\Product\Providers\ProductServiceProvider;
use Modules\Role\Providers\RoleServiceProvider;
use Modules\Settings\Providers\SettingsServiceProvider;
use Modules\Shipping\Providers\ShippingServiceProvider;
use Modules\Size\Providers\SizeServiceProvider;
use Modules\Tag\Providers\TagServiceProvider;
use Modules\Tenant\Providers\TenantServiceProvider;
use Modules\User\Providers\UserServiceProvider;
use Spatie\Feed\FeedServiceProvider;

return [
    App\Providers\AppServiceProvider::class,
    PermissionServiceProvider::class,
    FeedServiceProvider::class,
    UserServiceProvider::class,
    BannerServiceProvider::class,
    BrandServiceProvider::class,
    CartServiceProvider::class,
    CategoryServiceProvider::class,
    CouponServiceProvider::class,
    RoleServiceProvider::class,
    OrderServiceProvider::class,
    PostServiceProvider::class,
    ProductServiceProvider::class,
    SettingsServiceProvider::class,
    ShippingServiceProvider::class,
    TagServiceProvider::class,
    MessageServiceProvider::class,
    NotificationServiceProvider::class,
    FrontServiceProvider::class,
    CoreServiceProvider::class,
    NewsletterServiceProvider::class,
    SizeServiceProvider::class,
    AttributeServiceProvider::class,
    BillingServiceProvider::class,
    PermissionServiceProvider::class,
    Google2faServiceProvider::class,
    BundleServiceProvider::class,
    PageServiceProvider::class,
    TenantServiceProvider::class,
    OpenAIServiceProvider::class,
    AuthServiceProvider::class,
];