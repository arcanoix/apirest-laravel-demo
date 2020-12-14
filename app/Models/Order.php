<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $guarded = [];

    public function customer() : HasOne
    {
        return $this->hasOne(User::class, 'user_id');
    }

    public function products() : HasMany
    {
        return $this->hasMany(Product::class);
    }

}
