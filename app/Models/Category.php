<?php

namespace App\Models;

use App\Scopes\UserScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function booted()
    {
        static::addGlobalScope(new UserScope);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
