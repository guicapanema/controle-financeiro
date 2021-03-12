<?php

if (! function_exists('money')) {
    /**
     * money.
     *
     * @param int|string $amount
     *
     * @return \App\Support\Money
     */
    function money($amount = 0)
    {
        return new App\Support\Money(
            $amount,
            new Money\Currency(config('app.currency'))
        );
    }
}

