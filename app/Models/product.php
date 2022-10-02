<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{  
    use HasFactory;
    protected $fillable = ['category_id','title' , 'price' , 'desc' , 'quantity' , 'img'];
    protected $guarded = ["id" , 'created_at' , 'updated_at'];

    public function carts(){
        return $this->hasMany(Cart::class);
    }

    public function orders(){
        return $this->belongsToMany(Order::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

}
