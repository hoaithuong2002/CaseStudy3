<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart
{
    public $items = [];
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    function addToCart($id, $product)
    {
        $storeProduct = [
            "item" => $product,
            "totalQty" => 0,
            "totalPrice" => 0
        ];

        if (array_key_exists($id, $this->items)) {
            $storeProduct = $this->items[$id];
        }
        $storeProduct['totalQty']++;
        $storeProduct['totalPrice'] += $product->price;

        $this->items[$id] = $storeProduct;
        $this->totalQty++;
        $this->totalPrice += $product->price;
    }

    function deleteProduct($id)
    {
        if (key_exists($id, $this->items)) {
            $storeProductDelete = $this->items[$id];
            $this->totalQty -= $storeProductDelete['totalQty'];
            $this->totalPrice -= $storeProductDelete['totalPrice'];
            unset($this->items[$id]);
        }
    }

}
