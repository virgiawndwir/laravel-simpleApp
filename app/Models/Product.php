<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'product_category_id',
        'price',
        'image',
        'quantity',
        'qty',
    ];

    public function productCategory()
    {
        return $this->belongsTo('App\Models\ProductCategory');
    }

    protected $disk = null;
    protected $path = 'public/product/';

    public function img_url($size = null){
        $url  = asset('images/default.jpg'); // default 
        $size = (!is_null($size) ? $size.'/' : '');
        $path = $this->path.$size.$this->image;

        if($this->image && Storage::disk($this->disk)->exists($path)) $url = Storage::disk($this->disk)->url($path);
        return $url;
    }
}
