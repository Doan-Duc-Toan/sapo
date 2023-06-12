<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'description',
        'count',
        'price',
        'type',
        'supplier',
        'specifications',
        'user_id'
        // 'salient_features'
    ];
    public function cats(){
        return $this->belongsToMany(Cat::class, 'product_cat');
    }
    public function colors(){
        return $this->belongsToMany(Color::class, 'product_color')->withPivot('count');
    }
    public function thumbs(){
        return $this->hasMany(Thumb::class);
    }
}
