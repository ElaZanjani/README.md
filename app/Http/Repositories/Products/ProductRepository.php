<?php

namespace App\Http\Repositories\Products;

use App\Http\Traits\ProductTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ProductRepository implements ProductRepositoryInterface{
    use ProductTrait;
}
