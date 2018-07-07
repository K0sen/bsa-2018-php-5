<?php

namespace App\Http\Controllers;

use App\Services\CurrencyRepositoryInterface;
use App\Services\GetMostChangedCurrencyCommandHandler;
use App\Services\GetPopularCurrenciesCommandHandler;
use App\Services\CurrencyPresenter;

class CurrenciesController extends Controller
{
    /**
     * @var CurrencyRepositoryInterface
     */
    protected $currencyRepository;

    /**
     * CurrenciesController constructor.
     * @param CurrencyRepositoryInterface $currencyRepository
     */
    public function __construct(CurrencyRepositoryInterface $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPopularCurrencies()
    {
        $currencies = (new GetPopularCurrenciesCommandHandler($this->currencyRepository))->handle();

        return view('popular_currencies', compact('currencies'));
    }
}
