<?php

/**
 * Created by Zoran Shefot Bogoevski.
 */

namespace Modules\Brand\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Brand\Database\Factories\BrandFactory;
use Modules\Core\Models\Core;
use Modules\Product\Models\Product;

/**
 * Class Brand
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Collection|Product[] $products
 * @package App\Models
 * @property-read int|null $products_count
 * @method static Builder|Brand newModelQuery()
 * @method static Builder|Brand newQuery()
 * @method static Builder|Brand query()
 * @method static Builder|Brand whereCreatedAt($value)
 * @method static Builder|Brand whereId($value)
 * @method static Builder|Brand whereSlug($value)
 * @method static Builder|Brand whereStatus($value)
 * @method static Builder|Brand whereTitle($value)
 * @method static Builder|Brand whereUpdatedAt($value)
 * @mixin Eloquent
 * @property string $photo
 * @method static Builder|Brand wherePhoto($value)
 */
class Brand extends Core
{
    protected $table = 'brands';
    
    protected $fillable = [
        'title',
        'slug',
        'status',
        'photo',
    ];
    
    /**
     * @return BrandFactory
     */
    public static function Factory(): BrandFactory
    {
        return BrandFactory::new();
    }
    
    /**
     * @param $slug
     *
     * @return Model|Builder|null
     */
    public static function getProductByBrand($slug): Model|Builder|null
    {
        return Brand::with('products')->whereSlug($slug)->first();
    }
    
    /**
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
    
    /**
     * @param $slug
     *
     * @return mixed|string
     */
    public function incrementSlug($slug): mixed
    {
        $original = $slug;
        $count    = 2;
        while (static::whereSlug($slug)->exists()) {
            $slug = "{$original}-".$count++;
        }
        
        return $slug;
    }
}
