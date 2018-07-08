<?php

namespace App\Services;

class GetMostChangedCurrencyCommandHandler extends AbstractCurrenciesCommandHandler
{
    /**
     * Returns most changes for 24h currency
     *
     * @return Currency
     */
    public function handle(): Currency
    {
        $currencies = $this->currencyRepository->findAll();
        $mostChangedCurrency = $currencies[0];
        foreach ($currencies as $currency) {
            if (abs($mostChangedCurrency->getDailyChangePercent() < abs($currency->getDailyChangePercent()))) {
                $mostChangedCurrency = $currency;
            }
        }

        return $mostChangedCurrency;
    }
}
