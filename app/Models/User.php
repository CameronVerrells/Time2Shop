<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['cookie_id'];

    public function shoppingLists()
    {
        return $this->belongsToMany(ShoppingList::class);
    }
}