<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'categorys';

    protected $fillable = [
        'category_name',
        'category_attachment',
        'product_barcode',
        'status'
    ];
}
