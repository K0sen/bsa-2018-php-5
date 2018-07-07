<?php

namespace App\Services;

class GetPopularCurrenciesCommandHandler extends AbstractCurrenciesCommandHandler
{
    const POPULAR_COUNT = 3;

    /**
     * @param int $count
     * @return array
     */
    public function handle(int $count = self::POPULAR_COUNT): array
    {
        $currencies = $this->currencyRepository->findAll();
        usort($currencies, function ($firstCurrency, $secondCurrency) {
            /** @var $firstCurrency Currency **/
            /** @var $secondCurrency Currency **/
            return ($firstCurrency->getPrice() < $secondCurrency->getPrice()) ? 1 : -1;
        });

        return array_slice($currencies, 0, $count);
    }
}
