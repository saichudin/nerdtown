<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Vanilo\Cart\Models\CartItem;
use Vanilo\Contracts\Buyable;
use Vanilo\Product\Models\Product as BaseProduct;
use Vanilo\Support\Traits\BuyableImageSpatieV7;
use Vanilo\Support\Traits\BuyableModel;

class Product extends BaseProduct implements Buyable, HasMedia
{
    use BuyableModel,
        BuyableImageSpatieV7,
        HasMediaTrait;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumbnail')
            ->width(368)
            ->height(232)
            ->sharpen(10);
    }

    public function cartItem()
    {
        return $this->morphMany(CartItem::class, 'product');
    }
}
