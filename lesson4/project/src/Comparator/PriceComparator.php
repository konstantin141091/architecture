<?php

use Contract\IComparator;

class PriceComparator implements IComparator
{
    public function compare(array $products)
    {
        // здесь сортируем массив по price и возращаем его

        return $products;
    }
}
