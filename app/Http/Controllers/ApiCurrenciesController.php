<?php

namespace App\Http\Controllers;

use App\Services\GetMostChangedCurrencyCommandHandler;
use App\Services\CurrencyPresenter;

class ApiCurrenciesController extends CurrenciesController
{
    public function getApiUnstableCurrency()
    {
        $currencyArray = (new GetMostChangedCurrencyCommandHandler($this->currencyRepository))->handle();
        $currencies = CurrencyPresenter::present($currencyArray);

        return $currencies;
    }

    public function getApiCurrencies()
    {
        $currencyArray = $this->currencyRepository->findAll();
        $currencies = [];
        foreach ($currencyArray as $currency) {
            $currencies[] = CurrencyPresenter::present($currency);
        }

        return $currencies;
    }
}
