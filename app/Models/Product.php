<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['*'];

    protected function price(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => number_format($value,2,'.',''),
        );
    }

}
