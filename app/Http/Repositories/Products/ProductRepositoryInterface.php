<?php

namespace App\Http\Repositories\Products;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Interface ProductRepositoryInterface
 * @package App\Repositories
 */
interface ProductRepositoryInterface
{
    public function GetAllProducts(): Collection;

    public function GetProduct($productId);

    public function GetProductsBelongsToCategory($categoryid);
}
