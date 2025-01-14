<?php
/**
 * @link https://ymscanner.ru/api/bulkprice
 */
namespace MarketScanner\Model;

class Prices extends Base {

    /**
     * @var Price[]
     */
    protected $prices;

    public function __construct(string $key, string $id)
    {
        $this->setEntityUrl('/bulkprice');

        parent::__construct([
            'key' => $key,
            'id' => $id,
        ]);
    }

    public function getPrices(string $key)
    {
        $prices = [];

        foreach ($this->prices as $price) {
            $prices[] = (new Price($key, $price->id, false))->fill($price);
        }

        return $prices;
    }
}
