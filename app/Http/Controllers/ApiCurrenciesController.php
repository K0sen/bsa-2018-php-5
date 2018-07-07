<?php

namespace App\Http\Controllers;

use App\Services\GetMostChangedCurrencyCommandHandler;
use App\Services\CurrencyPresenter;

class ApiCurrenciesController extends CurrenciesController
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getApiUnstableCurrency()
    {
        $currencyArray = (new GetMostChangedCurrencyCommandHandler($this->currencyRepository))->handle();
        $currencies = CurrencyPresenter::present($currencyArray);

        return response()->json($currencies);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getApiCurrencies()
    {
        $currencyArray = $this->currencyRepository->findAll();
        $currencies = [];
        foreach ($currencyArray as $currency) {
            $currencies[] = CurrencyPresenter::present($currency);
        }

        return response()->json($currencies);
    }
}
