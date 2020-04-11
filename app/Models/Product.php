<?php

namespace App\Models;


use App\Models\Enums\ProductStatus;
use BenSampo\Enum\Traits\CastsEnums;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Product extends Model implements ProductInterface, HasMedia
{
    use SoftDeletes;
    use CastsEnums;
    use HasMediaTrait;

    /**
     * Specify the name of the database table.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'type',
        'status',
    ];

    /**
     * The attributes that have in date format.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $enumCasts = [
        'status' => ProductStatus::class,
    ];

    protected $casts = [
        'status' => 'int',
    ];

    /**
     * Get order items as a many to one relationship.
     *
     * @return HasMany
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::class, 'product_id');
    }

    /**
     * Get categories as a many to many relationship.
     *
     * @return BelongsToMany
     */
    public function getCategories()
    {
        return $this->belongsToMany(Category::class, 'category_product');
    }

}
