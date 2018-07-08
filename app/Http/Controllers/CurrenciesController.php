<?php

namespace App\Http\Controllers;

use App\Services\GetPopularCurrenciesCommandHandler;

class CurrenciesController extends Controller
{
    /**
     * @param GetPopularCurrenciesCommandHandler $commandHandler
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPopularCurrencies(GetPopularCurrenciesCommandHandler $commandHandler)
    {
        $currencies = $commandHandler->handle();

        return view('popular_currencies', compact('currencies'));
    }
}
