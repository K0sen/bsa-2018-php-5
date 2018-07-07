<?php

namespace App\Services;

use Ixudra\Curl\Facades\Curl;

class CurrencyGenerator
{
    public const IMG_PREFIX = "https://s2.coinmarketcap.com/static/img/coins/64x64/";
    private const COUNT = 10;

    /**
     * Gets list of cryptocurrencies from api of coinmarketcap.com
     *
     * @return Currency[]
     */
    public static function generate(): array
    {
//        $apiCurrenciesArray = self::getCurrenciesFromApi();
        $currenciesArray = [];
        $response = Curl::to('https://api.coinmarketcap.com/v2/ticker/?start=1&limit='. self::COUNT)
            ->get();
        $apiCurrenciesArray = json_decode($response, true);

        if ($response && isset($apiCurrenciesArray['data'])) {
            foreach ($apiCurrenciesArray['data'] as $currency) {
                $currenciesArray[] = new Currency(
                    $currency['id'],
                    $currency['name'],
                    $currency['quotes']['USD']['price'],
                    self::IMG_PREFIX . $currency['id'] . '.png',
                    $currency['quotes']['USD']['percent_change_24h']
                );
            }
        } else {
            $currenciesArray = [
                new Currency(1, "Bitcoin", 6620.92, self::IMG_PREFIX ."1.png", 0.16),
                new Currency(1027, "Ethereum", 471.934, self::IMG_PREFIX ."1027.png", 0.07),
                new Currency(52, "XRP", 0.470266, self::IMG_PREFIX ."52.png", -0.38),
                new Currency(1831, "Bitcoin Cash", 725.873, self::IMG_PREFIX ."1831.png", 0.2),
                new Currency(1765, "EOS", 8.56014, self::IMG_PREFIX ."1765.png", 0.69),
                new Currency(2, "Litecoin", 81.8338, self::IMG_PREFIX ."2.png", -1.53),
                new Currency(512, "Stellar", 0.203054, self::IMG_PREFIX ."512.png", -1.28),
                new Currency(2010, "Cardano", 0.140243, self::IMG_PREFIX ."2010.png", -2.64),
                new Currency(1720, "IOTA", 1.05374, self::IMG_PREFIX ."1720.png", 0.07),
                new Currency(825, "Tether", 1.00384, self::IMG_PREFIX ."825.png", -0.15)
            ];
        }

        return $currenciesArray;
    }

    private static function getCurrenciesFromApi()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.coinmarketcap.com/v2/ticker/?start=1&limit=". self::COUNT,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        return empty($err) ? json_decode($response, true)['data'] : [];
    }
}