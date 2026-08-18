<?php

namespace App\Http\Repositories\ProductGroups;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Interface ProductGroupRepositoryInterface
 * @package App\Repositories
 */
interface ProductGroupRepositoryInterface
{
    public function GetAllProductGroups(): Collection;
    public function GetAllMainGroup(): Collection;

    public function GetProductGroup($ProductGroupId);
    public function GetSubMainGroups($AnaGrup);
}
