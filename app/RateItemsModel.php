<?php


namespace App;


class RateItemsModel
{
    /**
     * @return string
     */
    public function getRateId(): string
    {
        return $this->rate_id;
    }

    /**
     * @return string
     */
    public function getRatePrice(): string
    {
        return $this->rate_price;
    }
  public $rate_id;
  public $rate_price;
}
