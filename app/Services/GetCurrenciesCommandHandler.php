<?php

namespace App\Services;

class GetCurrenciesCommandHandler extends AbstractCurrenciesCommandHandler
{
    /**
     * @return array
     */
    public function handle(): array
    {
        return $this->currencyRepository->findAll();
    }
}
