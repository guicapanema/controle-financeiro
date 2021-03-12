<?php

namespace App\Support;

use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use Money\Parser\IntlLocalizedDecimalParser;
use NumberFormatter;

class Money
{
    /**
     * @var \Money\Money
     */
    protected $money;

    /**
     * Money.
     *
     * @param int|string      $amount
     * @param \Money\Currency $currency
     */
    public function __construct($amount, Currency $currency)
    {
        $this->money = new \Money\Money($amount, $currency);
    }

    /**
     * __call.
     *
     * @param string $method
     * @param array  $arguments
     *
     * @return \App\Support\Money|\App\Support\Money[]|mixed
     */
    public function __call($method, array $arguments)
    {
        if (! method_exists($this->money, $method)) {
            return $this;
        }

        $result = call_user_func_array([$this->money, $method], static::getArguments($arguments));

        $methods = [
            'add', 'subtract',
            'multiply', 'divide', 'mod',
            'absolute', 'negative',
            'allocate', 'allocateTo',
        ];

        if (! in_array($method, $methods)) {
            return $result;
        }

        return static::convertResult($result);
    }

    /**
     * __toString.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->toCurrency();
    }

    /**
     * Format as decimal string.
     *
     * @return string
     */
    public function toDecimal()
    {
        $currencies = new ISOCurrencies();

        $numberFormatter = new NumberFormatter(config('app.locale'), NumberFormatter::PATTERN_DECIMAL, '#.00');
        $moneyFormatter = new IntlMoneyFormatter($numberFormatter, $currencies);

        return $moneyFormatter->format($this->money);
    }

    /**
     * Format as currency string.
     *
     * @return string
     */
    public function toCurrency()
    {
        $currencies = new ISOCurrencies();

        $numberFormatter = new NumberFormatter(config('app.locale'), NumberFormatter::CURRENCY);
        $moneyFormatter = new IntlMoneyFormatter($numberFormatter, $currencies);

        return $moneyFormatter->format($this->money);
    }

    /**
     * Parse decimal string.
     *
     * @param string $string
     *
     * @return \App\Support\Money
     */
    public function parseDecimal($string)
    {
        $currencies = new ISOCurrencies();

        $numberFormatter = new NumberFormatter(config('app.locale'), NumberFormatter::DECIMAL);
        $moneyParser = new IntlLocalizedDecimalParser($numberFormatter, $currencies);

        $this->money = $moneyParser->parse($string, new Currency(config('app.currency')));

        return $this;
    }

    /**
     * Get money.
     *
     * @return \Money\Money
     */
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * Get arguments.
     *
     * @param array $arguments
     *
     * @return array
     */
    private static function getArguments(array $arguments = [])
    {
        $args = [];

        foreach ($arguments as $argument) {
            $args[] = $argument instanceof static ? $argument->getMoney() : $argument;
        }

        return $args;
    }

    /**
     * Convert.
     *
     * @param \Money\Money $instance
     *
     * @return \App\Support\Money
     */
    public static function convert(\Money\Money $instance)
    {
        return static::fromMoney($instance);
    }

    /**
     * Convert result.
     *
     * @param mixed $result
     *
     * @return \App\Support\Money|\App\Support\Money[]
     */
    private static function convertResult($result)
    {
        if (! is_array($result)) {
            return static::convert($result);
        }

        $results = [];

        foreach ($result as $item) {
            $results[] = static::convert($item);
        }

        return $results;
    }

    /**
     * Create a new instance from the base money instance.
     *
     * @param \Money\Money $instance
     *
     * @return \App\Support\Money
     */
    public static function fromMoney(\Money\Money $instance)
    {
        return new Money($instance->getAmount(), $instance->getCurrency());
    }
}
