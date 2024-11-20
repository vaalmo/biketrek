<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Collection;

class Order extends Model
{
    protected $fillable = ['status', 'address', 'total', 'user_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    public function getTotal(): float
    {
        return $this->total ?? $this->products->sum(function ($product) {
            return $product->price * $product->pivot->quantity;
        });
    }

    public function setTotal(float $total): void
    {
        $this->attributes['total'] = $total;
    }
}
