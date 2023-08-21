<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'detail','store_id','price'
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

}
