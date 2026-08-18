<?php

namespace App\Http\Traits;

use App\Models\UrunKart;
use App\Models\AnaGrup;


use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

trait ProductTrait
{
    public function GetAllProducts(): Collection
    {
        $products = UrunKart::all();
        return $products;
    }

    public function GetMainCategory(): Collection
    {
        $products = UrunKart::all();
        return $products;
    }
    public function GetProduct($productId)
    {
        $product = UrunKart::where('Urun_id', $productId)->first();
        return $product;
    }

    public function GetProductsBelongsToCategory($categoryid)
    {
        $products = UrunKart::where('UrunGrubu_id', $categoryid)->orderBy('SiraNo')->get();
        return $products;
    }

    public function GetProductsByMainGroups($mainGroup)
    {
        $products = UrunKart::where('AnaGrup', $mainGroup)->orderBy('SiraNo')->get();
        return $products;
    }
}
