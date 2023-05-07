<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'category_id',
        'merk_id',
        'name',
        'unit',
        'contain',
        'discount',
        'purchase_price',
        'selling_price',
        'wholesale_price',
        'expired_date',
        'stock',
    ];

    protected $casts = [
        'id' => 'string',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function merk()
    {
        return $this->belongsTo(Merk::class);
    }

    public function expireds()
    {
        return $this->hasMany(Expired::class);
    }

    public function shoppings()
    {
        return $this->hasMany(Shopping::class);
    }

    public function sale_details()
    {
        return $this->hasMany(SaleDetail::class);
    }

    public function purchase_details()
    {
        return $this->hasMany(PurchaseDetail::class);
    }

}
