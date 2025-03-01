<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'price', 'region_id','climate', 'challenge_level'];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
        
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

}
