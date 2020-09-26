<?php


namespace Service\Product;


class ProductSort
{

    private $comparator;

    public function __construct($comparator)
    {
        $this->comparator = $comparator;
    }

    public function sort(array $product): array {
        usort($product, [$this->comparator, 'compare']);
    }
}
