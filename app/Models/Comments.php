<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\products;
class Comments extends Model
{
    use HasFactory;
    protected $table = 'comments';
    public $primaryKey = 'id';
    protected $dates = ['date'];
    protected $fillable = ['idProduct', 'idUser','content','date','status', 'title'];

    public function product()
    {
        return $this->belongsTo(Products::class, 'idProduct');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }
}