<?php

namespace App\Http\Repositories\ProductGroups;

use App\Http\Traits\ProductGroupTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ProductGroupRepository implements ProductGroupRepositoryInterface{
    use ProductGroupTrait;
}
