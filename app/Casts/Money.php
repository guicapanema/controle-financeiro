<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use InvalidArgumentException;

class Money implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return \Money\Money
     */
    public function get($model, $key, $value, $attributes)
    {
        return money($value);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return null|string
     */
    public function set($model, $key, $value, $attributes)
    {
        if ($value instanceof \App\Support\Money) {
            return $value->getAmount();
        }

        return (int) $value;
    }
}
