<?php

namespace App\Services;

class GetMostChangedCurrencyCommandHandler extends AbstractCurrenciesCommandHandler
{
    /**
     * @return Currency
     */
    public function handle(): Currency
    {
        $currencies = $this->currencyRepository->findAll();
        usort($currencies, function($firstCurrency, $secondCurrency)  {
            /** @var $firstCurrency Currency **/
            /** @var $secondCurrency Currency **/
            return (abs($firstCurrency->getDailyChangePercent()) < abs($secondCurrency->getDailyChangePercent())) ? 1 : -1;
        });

        return $currencies[0];
    }
}