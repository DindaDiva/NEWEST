<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_produk',
        'name',
        'description',
        'price',
        'type',
        'material',
        'size',
        'gender_category',
    ];

    protected $primaryKey = 'id';

    // Relasi ke tabel product_images
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
