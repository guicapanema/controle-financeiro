<?php

namespace App\Models\Concerns;

use App\Models\User;
use App\Scopes\UserScope;

trait BelongsToUser
{
    protected static function bootBelongsToUser()
    {
        static::addGlobalScope(new UserScope);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
