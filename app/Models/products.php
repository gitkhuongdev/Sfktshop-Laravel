<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;
use App\Models\Comments;
class products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $dates = ['date'];
    protected $fillable = [
        'name',
        'idCategory',
        'price',
        'slug',
        'sale',
        'image_1',
        'image_2',
        'image_3',
        'hot',
        'see',
        'status',
        'properties',
        'color',
        'quantity',
        'description',
    ] ;

    public function categories()
    {
        return $this->belongsTo(Categories::class, 'idCategory');
    }

    public function comments()
{
    return $this->hasMany(Comments::class, 'idProduct');
}
}