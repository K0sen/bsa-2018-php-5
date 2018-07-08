<?php

namespace App\Services;

class GetCurrenciesCommandHandler extends AbstractCurrenciesCommandHandler
{
    /**
     * Returns all currencies from repository
     *
     * @return array
     */
    public function handle(): array
    {
        return $this->currencyRepository->findAll();
    }
}
