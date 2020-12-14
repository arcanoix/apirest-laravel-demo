<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $guarded = [];

    public function customer() : HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function products() : BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'orders_products');
    }

}
