<?php

namespace App\Http\Controllers;

use App\Services\GetCurrenciesCommandHandler;
use App\Services\GetMostChangedCurrencyCommandHandler;
use App\Services\CurrencyPresenter;

class ApiCurrenciesController extends Controller
{
    /**
     * @param GetMostChangedCurrencyCommandHandler $commandHandler
     * @return \Illuminate\Http\JsonResponse
     */
    public function getApiUnstableCurrency(GetMostChangedCurrencyCommandHandler $commandHandler)
    {
        $currencyArray = $commandHandler->handle();
        $currencies = CurrencyPresenter::present($currencyArray);

        return response()->json($currencies);
    }

    /**
     * @param GetCurrenciesCommandHandler $commandHandler
     * @return \Illuminate\Http\JsonResponse
     */
    public function getApiCurrencies(GetCurrenciesCommandHandler $commandHandler)
    {
        $currencyArray = $commandHandler->handle();
        $currencies = [];
        foreach ($currencyArray as $currency) {
            $currencies[] = CurrencyPresenter::present($currency);
        }

        return response()->json($currencies);
    }
}
