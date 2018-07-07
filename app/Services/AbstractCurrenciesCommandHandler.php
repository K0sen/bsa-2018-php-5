<?php

namespace App\Services;

abstract class AbstractCurrenciesCommandHandler
{
    /**
     * @var CurrencyRepositoryInterface
     */
    protected $currencyRepository;

    /**
     * GetCurrenciesCommandHandler constructor.
     *
     * @param CurrencyRepositoryInterface $currencyRepository
     */
    public function __construct(CurrencyRepositoryInterface $currencyRepository) {

        $this->currencyRepository = $currencyRepository;

    }

    abstract public function handle();
}