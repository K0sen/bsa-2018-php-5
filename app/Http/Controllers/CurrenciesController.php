<?php

namespace App\Http\Controllers;

use App\Services\CurrencyRepositoryInterface;
use App\Services\GetMostChangedCurrencyCommandHandler;
use App\Services\GetPopularCurrenciesCommandHandler;
use App\Services\CurrencyPresenter;

class CurrenciesController extends Controller
{
    protected $currencyRepository;
    
    public function __construct(CurrencyRepositoryInterface $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
    }

    public function getPopularCurrencies()
    {
        $currencies = (new GetPopularCurrenciesCommandHandler($this->currencyRepository))->handle();

        return view('popular_currencies', compact('currencies'));
    }
}
